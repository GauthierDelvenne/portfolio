<?php

namespace portfolio\forms;

class ContactForm
{
    // Tableau pour stocker les règles de validation
    protected array $rules = [];
    // Tableau pour stocker les filtres de nettoyage des données
    protected array $sanitizers = [];

    public function __construct()
    {
    }

    // Ajoute une règle de validation pour un champ spécifique
    public function rule(string $field, string $rule): static
    {
        if (!array_key_exists($field, $this->rules)) {
            $this->rules[$field] = [];
        }

        $this->rules[$field][] = $rule;
        return $this;
    }

    // Définit une fonction de nettoyage pour un champ spécifique
    public function sanitize(string $field, string $callback): static
    {
        $this->sanitizers[$field] = $callback;
        return $this;
    }

    // Gère le traitement du formulaire
    public function handle(array $data): void
    {
        // Valide les données envoyées
        if (is_array($errors = $this->validate($data))) {
            // Stocke les erreurs en session et redirige vers la page précédente
            $_SESSION['portfolio_contact_form_errors'] = $errors;
            wp_safe_redirect($_SERVER['HTTP_REFERER']);
            exit;
        }

        // Nettoie les données reçues
        $data = $this->cleanData($data);

        // Envoie un mail de notification
        wp_mail(to: 'gauthier.delvenne@student.hepl.be', subject: 'Nouveau message "' . $data['subject'] . '"',
            message: $this->generateMailContent($data));

        // Sauvegarde les données du formulaire dans la base de données
        wp_insert_post([
            'post_type' => 'contact_message',
            'post_status' => 'publish',
            'post_title' => $data['lastname'].' '.$data['subject'],
            'post_content' => $this->generateMailContent($data)
        ]);

        // Stocke un message de succès en session et redirige vers la page précédente
        $_SESSION['portfolio_contact_form_success'] = 'Merci ' . $data['lastname'] . ', votre message a bien été envoyé';
        wp_safe_redirect($_SERVER['HTTP_REFERER']);
        exit;
    }

    // Valide les données du formulaire en fonction des règles définies
    protected function validate(array $data): bool|array
    {
        $errors = [];

        foreach ($this->rules as $field => $rules) {
            foreach ($rules as $rule) {
                $method = 'check_' . $rule;
                $error = $this->$method($field, $data[$field] ?? null);
                if (!is_string($error)) continue;
                $errors[$field] = $error;
                break;
            }
        }

        return $errors ?: true;
    }

    // Nettoie les données en appliquant les fonctions de sanitization définies
    protected function cleanData(array $data): array
    {
        $cleaned = [];
        foreach ($this->sanitizers as $field => $callback) {
            $cleaned[$field] = call_user_func($callback, $data[$field] ?? null);
        }
        return $cleaned;
    }

    // Génère le contenu du mail envoyé après soumission du formulaire
    protected function generateMailContent(array $data): string
    {
        return 'Bonjour,' . PHP_EOL . PHP_EOL
            . 'Un nouveau message a été envoyé par le formulaire de contact.' . PHP_EOL . PHP_EOL
            . 'Nom: ' . $data['lastname'] . PHP_EOL
            . 'E-mail: ' . $data['email'] . PHP_EOL
            . 'Numéro de téléphone: ' . $data['phone'] . PHP_EOL
            . 'Sujet: ' . $data['subject'] . PHP_EOL
            . 'Message:' . PHP_EOL
            . $data['message'];
    }

    // Vérifie si un champ est requis
    protected function check_required(string $field, mixed $value): bool|string
    {
        if ($value || $value == 0) {
            return true;
        }

        return 'Ce champ est requis.';
    }

    // Vérifie si l'email est valide
    protected function check_valid_email(string $field, mixed $value): bool|string
    {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return 'L\'adresse mail n\'est pas valide.';
    }

}

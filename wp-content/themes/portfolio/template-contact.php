<?php /* Template Name: Template "Contact" */ ?>
<?php get_header(); ?>
<section class="forms">
    <h2 class="form_title">
        <?php the_title(); ?>
    </h2>
    <div class="forms_information">
        <p class="forms_information_title"><?= get_field('form_information_title'); ?></p>
        <div class="forms_information_content">
        <p><?= get_field('form_information_phone'); ?></p>
        <p><?= get_field('form_information_mail'); ?></p>
        </div>
    </div>
    <?php
    $errors = $_SESSION['portfolio_contact_form_errors'] ?? [];
    unset($_SESSION['portfolio_contact_form_errors']);
    $success = $_SESSION['portfolio_contact_form_success'] ?? [];
    unset($_SESSION['portfolio_contact_form_success']);
    ?>
    <?php if ($success): ?>
        <p class="field_success"><?= $success; ?></p>
    <?php else : ?>
        <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="POST" class="form">
            <fieldset class="form_fields">
                <div class="field">
                    <label for="lastname" class="field_label">Nom</label>
                    <input type="text" name="lastname" id="lastname" class="field_input" placeholder="Votre nom">
                    <?php if (isset($errors['lastname'])): ?>
                        <p class="field_error"><?= $errors['lastname']; ?></p>
                    <?php endif ?>
                </div>
                <div class="field">
                    <label for="email" class="field_label">Adresse mail</label>
                    <input type="email" name="email" id="email" class="field_input" placeholder="Votre adresse mail">
                    <?php if (isset($errors['email'])): ?>
                        <p class="field_error"><?= $errors['email']; ?></p>
                    <?php endif ?>
                </div>
                <div class="field">
                    <label for="phone" class="field_label">Numéro de téléphone</label>
                    <input type="tel" name="phone" id="phone" class="field_input" placeholder="Votre numéro de téléphone">
                    <?php if (isset($errors['phone'])): ?>
                        <p class="field_error"><?= $errors['phone']; ?></p>
                    <?php endif ?>
                </div>
                <div class="field">
                    <label for="subject" class="field_label">Sujet</label>
                    <input type="text" name="subject" id="subject" class="field_input" placeholder="Votre sujet">
                    <?php if (isset($errors['subject'])): ?>
                        <p class="field_error"><?= $errors['subject']; ?></p>
                    <?php endif ?>
                </div>
                <div class="field">
                    <label for="message" class="field_label">Message</label>
                    <textarea name="message" id="message" class="field_input" placeholder="Votre texte"></textarea>
                    <?php if (isset($errors['message'])): ?>
                        <p class="field_error"><?= $errors['message']; ?></p>
                    <?php endif ?>
                </div>
            </fieldset>
            <div class="form_submit">
                <input type="hidden" name="action" value="portfolio_contact_form_submit">
                <button type="submit" class="btn">Envoyer</button>
            </div>
        </form>
    <?php endif ?>
</section>
<?php get_footer(); ?>


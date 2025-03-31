<?php /* Template Name: Template "Contact" */ ?>
<?php get_header(); ?>
<section class="formulaire">
    <h2 class="formulaire_title">
        <?php the_title(); ?>
    </h2>
    <div class="formulaire_information">
        <p class="formulaire_information_title"></p>
        <p></p>
        <p></p>
    </div>
    <?php
    $errors = $_SESSION['portfolio_contact_form_errors'] ?? [];
    unset($_SESSION['portfolio_contact_form_errors']);
    $success = $_SESSION['portfolio_contact_form_success'] ?? [];
    unset($_SESSION['portfolio_contact_form_success']);
    ?>
    <?php if ($success): ?>
        <p class="field__success"><?= $success; ?></p>
    <?php else : ?>
        <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="POST" class="form">
            <fieldset class="form__fields">
                <div class="field">
                    <label for="lastname" class="field__label">Nom</label>
                    <input type="text" name="lastname" id="lastname" class="field__input">
                    <?php if (isset($errors['lastname'])): ?>
                        <p class="field__error"><?= $errors['lastname']; ?></p>
                    <?php endif ?>
                </div>
                <div class="field">
                    <label for="email" class="field__label">Adresse mail</label>
                    <input type="email" name="email" id="email" class="field__input">
                    <?php if (isset($errors['email'])): ?>
                        <p class="field__error"><?= $errors['email']; ?></p>
                    <?php endif ?>
                </div>
                <div class="field">
                    <label for="phone" class="field__label">Numéro de téléphone</label>
                    <input type="tel" name="phone" id="phone" class="field__input">
                    <?php if (isset($errors['phone'])): ?>
                        <p class="field__error"><?= $errors['phone']; ?></p>
                    <?php endif ?>
                </div>
                <div class="field">
                    <label for="subject" class="field__label">Sujet</label>
                    <input type="text" name="subject" id="subject" class="field__input">
                    <?php if (isset($errors['subject'])): ?>
                        <p class="field__error"><?= $errors['subject']; ?></p>
                    <?php endif ?>
                </div>
                <div class="field">
                    <label for="message" class="field__label">Message</label>
                    <textarea name="message" id="message" class="field__input"></textarea>
                    <?php if (isset($errors['message'])): ?>
                        <p class="field__error"><?= $errors['message']; ?></p>
                    <?php endif ?>
                </div>
            </fieldset>
            <div class="form__submit">
                <input type="hidden" name="action" value="portfolio_contact_form_submit">
                <button type="submit" class="btn">Envoyer</button>
            </div>
        </form>
    <?php endif ?>
</section>
<?php get_footer(); ?>


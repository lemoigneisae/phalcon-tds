<div class="ui container">
    <?php if (isset($Msg)) { ?>
        <div class="ui green message"><?= $Msg ?></div>
    <?php } ?>

    <div class="ui icon menu">
        <?= $this->tag->linkTo(['users/', '
            <i class=\'sign out icon icon\'></i> Retour à la liste
        ', 'class' => 'item']) ?>
    </div>

    <div class="ui icon message">
        <i class="info icon"></i>
        <div class="content">
            <div class="header">
                Message
            </div>
            <p>Modification de <?= $update->getFirstname() ?> <?= $update->getLastname() ?>.</p>
        </div>
    </div>

    <div class="ui equal width form">
        <form method="post">

            <div class="fields">
                <div class="field">
                    <label>Prénom</label>
                    <input name="firstname" value="<?= $form->getFirstname() ?>" placeholder="First Name" type="text">
                </div>

                <div class="field">
                    <label>Nom</label>
                    <input name="lastname" value="<?= $form->getLastname() ?>" placeholder="Last Name" type="text">
                </div>
            </div>

            <div class="fields">
                <div class="field required">
                    <label>Login</label>
                    <input name="login" value="<?= $form->getLogin() ?>" placeholder="Login" type="text">
                </div>

                <div class="field required">
                    <label>Mot de passe</label>
                    <input name="password" value="<?= $form->getPassword() ?>" placeholder="Password" type="password">
                </div>
            </div>

            <div class="fields">
                <div class="field required">
                    <label>Email</label>
                    <input name="email" value="<?= $form->getEmail() ?>" placeholder="Email" type="email">
                </div>
            </div>

            <div class="fields">
                <div class="field">
                    <label>Role</label>
                    <select name="idrole" class="ui search dropdown">
                        <?php foreach ($roles as $role) { ?>
                            <?php if ($role->id == $update->getIdrole()) { ?>
                                <option value="<?= $role->id ?>" selected><?= $role->name ?></option>
                            <?php } else { ?>
                                <option value="<?= $role->id ?>"><?= $role->name ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="fields">
                <input class="fluid positive ui button" type="submit" value="Valider">
                <input class="fluid ui button" type="reset" value="Réinitialiser">
            </div>
        </form>
    </div>
</div>
<div class="ui container">
    <?php if (isset($Msg)) { ?>
        <div class="ui green message"><?= $Msg ?></div>
    <?php } ?>

    <div class="ui icon menu">
        <?= $this->tag->linkTo(['users/', '
        <i class=\'sign out icon icon\'></i> Retour à la liste
        ', 'class' => 'item']) ?>
    </div>

    <table class="ui definition table">
        <tbody>

            <tr>
                <td>Prénom</td>
                <td><?= $show->getFirstname() ?></td>
            </tr>

            <tr>
                <td>Nom</td>
                <td><?= $show->getLastname() ?></td>
            </tr>

            <tr>
                <td>Login</td>
                <td><?= $show->getLogin() ?></td>
            </tr>

            <tr>
                <td>Adresse mail</td>
                <td>
                    <div class="ui label">
                        <i class="sign in icon"></i> <?= $show->getEmail() ?>
                    </div>
                </td>
            </tr>

            <tr>
                <td>Rôle</td>
                <td><?= $show->getRole()->getName() ?></td>
            </tr>

        </table>
    </tbody>
</div>
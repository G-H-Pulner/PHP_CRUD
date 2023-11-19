<?php
require_once("Includes/Header.php");
require_once("{$_SERVER['DOCUMENT_ROOT']}/PHP_CRUD/Class/ClassCrud.php");
?>

<div class="Content">
    <table class="TabelaCrud">
        <tr>
            <td>Nome</td>
            <td>Sexo</td>
            <td>Cidade</td>
            <td>Ações</td>
        </tr>

        <!--Estrutura de loop-->
        <?php
        $Crud = new ClassCrud();
        $BFetch = $Crud->selectDB("*", "cadastro", "", array());

        while ($Fetch = $BFetch->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <td><?php echo $Fetch['Nome']; ?></td>
                <td><?php echo $Fetch['Sexo']; ?></td>
                <td><?php echo $Fetch['Cidade']; ?></td>
                <td>
                    <a href="<?php echo "visualizar.php?Id={$Fetch['Id']}"; ?>">visualizar</a>
                    <a href="<?php echo "cadastro.php?Id={$Fetch['Id']}"; ?>">Editar</a>
                    <a class="Deletar" href="<?php echo "Controllers/ControllerDeletar.php?Id={$Fetch['Id']}"; ?>">Deletar</a>
                </td>
            </tr>

        <?php
        }
        ?>
    </table>
</div>

<?php require_once("Includes/Footer.php") ?>
<h2 class="dashboard__heading"><?php echo $titulo; ?>
<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/eventos">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver
    </a>
</div>



<div class="dashboard__formulario">
    <?php include_once __DIR__.'/../../templates/alertas.php'; ?>
    <form method="POST" action="/admin/eventos/crear" class="formulario">
        <?php include_once __DIR__.'/formulario.php'; ?>
        <input class="formulario__submit formulario_submit--registrar" type="submit" value="Registrar Evento">
    </form>
</div>
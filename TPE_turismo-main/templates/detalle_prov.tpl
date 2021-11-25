{include file="templates/header.tpl"}

<div class="container d-inline">
    <a class="btn btn-info" href="inicio">Volver</a>
    <h1 class="text-center">Nombre: {$provincias->nombre_prov}</h1>
    <h2 class="text-center">Region: {$provincias->region}</h2>
    <h2 class="text-center">Cantidad de Poblacion: {$provincias->cant_poblacion}</h2>
</div>

{include file="templates/footer.tpl"}
{include file="templates/header.tpl"}
    
    <a class="btn btn-success" href="logout">Logout </a>
    <form class="mb-3 text-center" action="buscarPorProvincia" method="POST">
        Filtrar Atracciones por Provincia: <input type="text" name="provincia" id="provincia">
        <input class="btn btn-info" type="submit" value=Buscar > 
        <a class="btn btn-info" type="submit" href=inicio>Limpiar Filtro</a>
    </form>
        
    <div class="container container-sm">
        <table class="table table-sm">
        <thead>
            <th>Atraccion</th>
            <th>Provincia</th>
        </thead>
            {foreach from=$atracciones item=$atraccion}
                <tr class="table-info">
                    <td>{$atraccion->nombre}</td>
                    <td>{$atraccion->nombre_prov}</td>
                </tr>
            {/foreach}
        </table>
        
    </div>

    {include file="templates/comentarios.tpl"} 

    <form class="mb-3" id="comment-form" action="agregarComentario" method="POST">
        <div>    
            <label>Email:</label>
            <input class="opinar" type="text" name= "email" id="email" >
            <input type="hidden" value="id_usuario" class="opinar" name= "id_usuario" id="id_usuario">
            <label>Puntaje:</label> 
            <select name="puntaje" id="puntaje"> 
                <option value=1 class="opinar" name="atraccion">1</option>
                <option value=2 class="opinar" name="atraccion">2</option>
                <option value=3 class="opinar" name="atraccion">3</option>
                <option value=4 class="opinar" name="atraccion">4</option>
                <option value=5 class="opinar" name="atraccion">5</option>
            </select>
            <label>Atracción:</label> 
            <select class="opinar" name="id_atraccion" id="id_atraccion">
                {foreach from=$atracciones item=$atraccion }
                    <option value={$atraccion->id} class="opinar" name="atraccion">{$atraccion->nombre}</option>
                {/foreach} 
            </select>
        </div>
        <div>
            <textarea cols="80" rows="5" class="opinar" type="text" name="opinion" id="opinion" placeholder='Escribí tu opinión'></textarea>
        </div>
        <input id="opinar" class="btn btn-light btn-sm" type="submit" value="Agregar Comentario">
    </form>
    <script src="js/comment.js"></script>  

{include file="templates/footer.tpl"}

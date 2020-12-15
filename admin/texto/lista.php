<?
$id = dr($_GET["id"]);

//include("foto/limpaGaleria.php");
$apaga = $obj->apagar("excluir");

if(!empty($id)){
    $ftAux= "WHERE page_fk={$id} AND excluido = 0";
    $consulta = fetch_all($obj->consultaSelect("texto.id, "
            . "texto.rf_nm, "
            . "texto.ctrl, "
            . "texto.page_fk, "
            . "texto.titulo ",
            $ftAux,
            "ORDER BY ordem ASC"));
} else {
    echo "<div class='alert alert-danger text-center fBold'>Utilize o painel corretamente...</div>";
    die();
}
if(!empty($consulta)){
    foreach ($consulta as $campo) {
        $i_ctrl = explode("-", $campo["ctrl"]);
        $i_img = $i_ctrl[3];
        $i_vid = $i_ctrl[4];
        $i_del = $i_ctrl[5];
        $i_top = $i_ctrl[7];

        if($i_img == 1){$col_img = 1;}
        if($i_vid == 1){$col_vid = 1;}
        if($i_top == 1){$col_top = 1;}
    }
}
?>

<div class="pnl-hd-title"><h4><?=$titulo?></h4></div>
<form method="POST" action="">
    <table class="table">
        <thead>
            <tr class="text-center-f">
                <th width="3%"></th>
                <th class="text-left-f" width="67%">Titulo</th>
               <th width='10%' align='center'>Foto</th>
                <?=(!empty($col_vid)) ? "<th width='10%' align='center'>Vídeo</th>" : "";?>
                <?/*=(!empty($col_top)) ? "<th width='10%' align='center'>Tópico</th>" : "";*/?>
            </tr>
        </thead>
        <tbody id="sortable">
            <?
            if(!empty($consulta)){
                foreach($consulta as $campo){
                    $i_ctrl = explode("-", $campo["ctrl"]);
                    $i_img  = $i_ctrl[3];
                    $i_vid  = $i_ctrl[4];
                    $i_del  = $i_ctrl[5];
                    $i_top  = $i_ctrl[7];

                    $qtd_img = $obj_img->totalRegistros("WHERE texto_fk=".$campo["id"]);
                    $qtd_vid = $obj_vid->totalRegistros("WHERE texto_fk=".$campo["id"]);
                    $qtd_top = $obj_top->totalRegistros("WHERE texto_fk=".$campo["id"]);
                    $url_img = $pathSite."admin/".$tabela."/foto/".cr($campo["id"])."/".arruma_string($campo["titulo"]);
                    $url_vid = $pathSite."admin/".$tabela."/video/".cr($campo["id"])."/".arruma_string($campo["titulo"]);
                    /*$url_top = $pathSite."admin/".$tabela."/topico/".cr($campo["id"])."/".arruma_string($campo["titulo"]);*/

                    $url_info = $pathSite."admin/".$tabela."/form/".cr($campo["id"])."/".arruma_string($campo["rf_nm"]);
                    ?>
                    <tr class="sort bg-line-zebra text-center" rel="<?=$campo["id"]?>" height="50">
                        <td>
                            <?=($i_del == "1") ? "<input type='checkbox' name='excluir[]' value='{$campo["id"]}'/>" : ""?>
                        </td>
                        <td class="text-left"><a href="<?=$url_info?>"><?=$campo["rf_nm"]?></a></td>
                        <?
                       // if($col_img == 1){
                            echo "<td><a href='{$url_img}'>Fotos ({$qtd_img})</a></td>";
                        //}
                        if($col_vid == 1){
                            echo "<td>".(($i_vid == 1) ? "<a href='{$url_vid}'>Vídeos ({$qtd_vid})</a>" : "")."</td>";
                        }
                        /*if($col_top == 1){
                            echo "<td>".(($i_top == 1) ? "<a href='{$url_top}'>Tópicos ({$qtd_top})</a>" : "")."</td>";
                        }*/
                        ?>
                    </tr>
                    <?
                }
            }
            ?>
        </tbody>
    </table>
</form>
<?
$apaga = $obj->apagar("excluir");
$consulta = fetch_all($obj->consulta("WHERE id > 1"));
?>
<div class="pnl-hd-title bg-opc-01">
    <h4><?=$titulo?>
        <small> - <a class="text-info" href="<?=$pathSite.'admin/'.$tabela.'/form/adicionar'?>">Adicionar</a></small>
    </h4>
</div>
<form class="table-responsive col-xs-12 pdg-0" method="POST" action="" enctype="multipart/form-data">
    <table class="table">
        <thead>
            <tr class="text-center">
                <th width="3%" class="text-left-f"></th>
                <th class="text-left-f">Nome</th>
            </tr>
        </thead>
        <tbody id="sortable">
            <?
            if(!empty($consulta)){
                foreach($consulta as $campo){
                $url_info = $pathSite."admin/".$tabela."/form/".cr($campo["id"])."/".arruma_string($campo["rf_nm"]);
                ?>
                <tr class="sort bg-line-zebra" rel="<?=$campo["id"]?>" height="50">
                    <td><input type="checkbox" name="excluir[]" value="<?=$campo["id"]?>"/></td>
                    <td><a href="<?=$url_info?>"><?=$campo["nome"]?></a></td>
                </tr>
                <?
                }
            }
            ?>
        </tbody>
    </table>
    <div class="col-xs-12 pdg-0 pdg-b-20 pdg-t-20">
        <input class="pz-btn-shadow op-live-2d bg-danger text-danger flt-r f-bold sm-wd-100" type="submit" value="Excluir">
    </div>
</form>
<?php

require_once './shared/header.php';
?>
<?php

echo '<div style="
    margin: 30px auto;
    width: 350px;
    align-content: center;">';
echo '<div class="d-grid">';
@$cod = $_REQUEST['cod'];
if (isset($cod)) {
    if ($cod == '170') {
        echo ('<br><div class="alert alert-danger">');
        echo ('Dados não inseridos.');
        echo ('</div>');
    }
    if ($cod == '172') {
        echo ('<br><div class="alert alert-success">');
        echo ('Dados inseridos com sucesso');
        echo ('</div>');
    }
}
echo '</div>';
echo '</div>';
?>
<?php

@session_start();
//$s_n = $_POST['checkbox'];
if (@$_SESSION['user'] == 'pct') {
    echo ' <div class="entrar entrar2">
    <form method="POST" action="controller/solicitarConsultaController.php">
        <h1>Informações da Consulta:</h1>
        <input type="hidden" name="id" value="id" id="id" class="input" >
        <h3>Data:</h3>
        <input type="date" name="data" id="data" class="input" placeholder="Insira data desejada">
        <h3>Hora:</h3>
        <input type="time" name="hora" id="hora" class="input" placeholder="Insira hora desejada">
        <h3>Seriço:</h3>
        <input type="text" name="servico" id="servico" class="input" placeholder="Insira o tipo de serviço">
        <input type="hidden" name="paciente_id" value="' . $_SESSION['id'] . '">
        <input type="submit" name="entrar" value="Entrar" class="submit">
    </form>
</div>';
}
//if ($s_n == '0') {
if (@$_SESSION['user'] == 'socia' || @$_SESSION['user'] == 'atendente') {
    require_once 'solicitarConsulta.php';
    echo '<div class=" form-switch entrar entrar2" style="width: 800px">
    <form method="get" action="solicitarConsulta.php">
        <h2>Escolha o tipo de consulta que deseja visualizar:</h2>
        <div class="check">
            <b class=" checkb">solicitadas</b>
            <input class="checkBox form-check-input" for="checkbox" name="checkbox" value="1" type="checkbox" id="checkbox">
            <b class=" checkb2">aceitas</b>
        </div>
        <input class="submit" style="width:80px" type="submit">
    </form>
</div>';
    @$check = $_GET['checkbox'];
    if ($check == 1) {
        require_once './controller/solicitarConsultaController.php';
        $solicitarList = loadAll1S();
        $solicitarLista = loadAll1A();
        echo '<div class="tabela table-bordered">
        <table>
        <tr>
            <th>Nome</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Serviço</th>
            <th></th>
        </tr>';
        foreach ($solicitarList as $solicitar) {
            echo '<tr>';
            echo '<td class="tabelaitens">';
            echo $solicitar['nome'];
            echo '</td>';
            echo '<td class="tabelaitens">';
            echo $solicitar['data'];
            echo '</td>';
            echo '<td class="tabelaitens">';
            echo $solicitar['hora'];
            echo '</td>';
            echo '<td class="tabelaitens">';
            echo $solicitar['servico'];
            echo '</td>';
            echo '</tr>';
        }foreach ($solicitarLista as $solicitar) {
            echo '<tr>';
            echo '<td class="tabelaitens">';
            echo $solicitar['nome'];
            echo '</td>';
            echo '<td class="tabelaitens">';
            echo $solicitar['data'];
            echo '</td>';
            echo '<td class="tabelaitens">';
            echo $solicitar['hora'];
            echo '</td>';
            echo '<td class="tabelaitens">';
            echo $solicitar['servico'];
            echo '</td>';
            echo '</tr>';
        }
    } else {
        require_once './controller/solicitarConsultaController.php';
        if (empty(loadAll0())) {
            $solicitarlist = loadAll0();
            echo '<div class="tabela">
        <table>
        <tr>
            <th>Nome</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Serviço</th>
            <th></th>
        </tr>';
            foreach ($solicitarlist as $solicitar) {
                echo '<tr>';
                echo '<td class="tabelaitens">';
                echo $solicitar['nome'];
                echo '</td>';
                echo '<td class="tabelaitens">';
                echo $solicitar['data'];
                echo '</td>';
                echo '<td class="tabelaitens">';
                echo $solicitar['hora'];
                echo '</td>';
                echo '<td class="tabelaitens">';
                echo $solicitar['servico'];
                echo '</td>';
                //Operações
                echo '<td class="tabelaitens">';
                echo '<a class="btn btn-success" href="./controller/solicitarConsultaController.php?'
                . 'cod=aprov&&id=' . $solicitar['id'] . '&&data_aprov=' . (new \DateTime())->format('Y-m-d H:i:s') . ''
                . '&&adm_id=' . @$_SESSION['ADM'] . '">Aprovar</a>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo '<div style="
    margin: 30px auto;
    width: 350px;
    align-content: center;">';
            echo '<div class="d-grid">';
            echo '<br><div class="alert alert-success">';
            echo 'Não há consultas para aprovar!';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    echo '</table></div>';
}
?>

<?php

require_once './shared/footer.php';

function getDatetimeNow() {
    $tz_object = new DateTimeZone('Brazil/East');
    //date_default_timezone_set('Brazil/East');
    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ h:i:s');
}
?>

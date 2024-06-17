<h2>Resultados da Pesquisa</h2>

<h3>Estadias</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Data de Entrada</th>
        <th>Data de Saída</th>
        <th>Serviço</th>
        <th>Empregado</th>
    </tr>
    <?php foreach ($estadias as $estadia): ?>
    <tr>
        <td><?php echo htmlspecialchars($estadia['ID']); ?></td>
        <td><?php echo htmlspecialchars($estadia['Dt_Entrada']); ?></td>
        <td><?php echo htmlspecialchars($estadia['Dt_Saida']); ?></td>
        <td><?php echo htmlspecialchars($estadia['Servico']); ?></td>
        <td><?php echo htmlspecialchars($estadia['fk_Empregado_ID']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<h3>Quartos Disponíveis</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Número</th>
        <th>Capacidade</th>
        <th>Empresa</th>
    </tr>
    <?php foreach ($quartos as $quarto): ?>
    <tr>
        <td><?php echo htmlspecialchars($quarto['ID']); ?></td>
        <td><?php echo htmlspecialchars($quarto['Numero']); ?></td>
        <td><?php echo htmlspecialchars($quarto['Capacidade_Pessoa']); ?></td>
        <td><?php echo htmlspecialchars($quarto['fk_Empresa_ID']); ?></td>
    </tr>
    <?php endforeach; ?>
</table>

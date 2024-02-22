<?php
include_once("../conexion.php");
$sql = "SELECT * FROM (
    SELECT s.Id, s.organismo, s.cantidad, s.fecha_sub AS fecha FROM subvenciones s
    UNION ALL
    SELECT d.id_donacion, d.nombre_donante, d.cantidad, d.fecha FROM donaciones d 
    UNION ALL
    SELECT m.id_miembro, m.NombreCompleto, m.Cantidad, m.Fecha_cobr FROM miembros m
) AS combined_data
ORDER BY fecha DESC;";
$resultset = mysqli_query($conexion, $sql) or die("database error:". mysqli_error($conexion));
require('../fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
while ($field_info = mysqli_fetch_field($resultset)) {
$pdf->Cell(38,12,$field_info->name,1);
}
while($rows = mysqli_fetch_assoc($resultset)) {
$pdf->SetFont('Arial','',8);
$pdf->Ln();
foreach($rows as $column) {
$pdf->Cell(38,12,$column,1);
}
}
$pdf->Output();
?>
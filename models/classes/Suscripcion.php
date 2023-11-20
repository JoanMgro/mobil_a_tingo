<?php
class Suscripcion
{
    //propiedades
    private ?int $id;
    private ?string $empresa;
    private ?int $plan;
    private ?string $dateInicio;
    private ?string $dateFinal;
    private ?int $activo;

    //metodos
    public function listar(Conexion $conn, $empresa)
    {
        $dbh = $conn->get_conexion();
        
        $sql = "SELECT s.id_suscripcion, s.plan, p.nom_plan, s.fecha_inicio, s.fecha_fin, s.estado_suscripcion ";
        $sql .= "FROM Suscripciones s ";
        $sql .= "INNER JOIN Planes_Mobilatingo p ON s.plan = p.id_plan ";
        $sql .= "WHERE s.empresa = :empresa";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':empresa', $empresa);
        $stmt->execute();
        $suscripciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dbh = null;
        $stmt = null;
        return $suscripciones;
    }
    public function crear(Conexion $conn, $plan, $empresa, $diasVigencia, $activo)
    {
        $fechaFin = date('Y-m-d h:i:s', strtotime("+ {$diasVigencia} days"));
        
       
        $dbh = $conn->get_conexion();
        
        $sql = "INSERT INTO Suscripciones (empresa, plan, fecha_fin, estado_suscripcion) ";
        $sql .= "VALUES (:empresa, :plan, :fechaFin, :estado)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':empresa', $empresa);
        $stmt->bindValue(':plan', $plan);
        $stmt->bindValue(':fechaFin', $fechaFin);
        $stmt->bindValue(':estado', $activo);
        $stmt->execute();
       
        $dbh = null;
        $stmt = null;
       
    }


}
// require_once __DIR__ . '/' . './Conexion.php';
// (new Suscripcion)->crear(new Conexion, '1', 'logica@gmail.com', '180', 1);
?>
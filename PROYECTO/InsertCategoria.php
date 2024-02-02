<?php
/**
 * InsertCategoriaSOAP Service
 *
 * This script defines a SOAP service for inserting a category.
 *
 * @author acoexo
 * @version 1.0
 */

// Include the NuSOAP library
require_once "vendor/econea/nusoap/src/nusoap.php";

// Set the namespace for the service
$namespace = "InsertCategoriaSOAP";

// Create a new SOAP server instance
$server = new soap_server();

// Configure the WSDL for the service
$server->configureWSDL("InsertCategoria", $namespace);
$server->wsdl->schemaTargetNamespace = $namespace;

// Define the complex type for the input parameters
$server->wsdl->addComplexType(
    'InsertCategoria',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'usu_nom' => array('name' => 'usu_nom', 'type' => 'xsd:string'),
        'usu_ape' => array('name' => 'usu_ape', 'type' => 'xsd:string'),
        'usu_correo' => array('name' => 'usu_correo', 'type' => 'xsd:string'),
    )
);

// Define the complex type for the response
$server->wsdl->addComplexType(
    'response',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'Resultado' => array('name' => 'Resultado', 'type' => 'xsd:boolean'),
    )
);

// Register the service method
$server->register(
    "InsertCategoriaService",
    array("InsertCategoria" => "tns:InsertCategoria"),
    array("InsertCategoria" => "tns:response"),
    $namespace,
    false,
    "rpc",
    "encoded",
    "Inserta una categoria"
);

/**
 * InsertCategoriaService
 *
 * This function inserts a category into the database.
 *
 * @param array $request The request parameters.
 * @return array The response with a boolean result.
 */
function InsertCategoriaService($request)
{
    require_once "config/conexion.php";
    require_once "models/Usuario.php";

    $usuario = new Usuario();
    $usuario->insert_usuario($request["usu_nom"], $request["usu_ape"], $request["usu_correo"]);

    return array(
        "Resultado" => true
    );
}

// Get the raw POST data
$POST_DATA = file_get_contents("php://input");

// Process the SOAP request
$server->service($POST_DATA);

// Exit the script
exit();
?>

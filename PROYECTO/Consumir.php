<?php
/**
 * InsertCategoria SOAP Client
 *
 * This script sends a SOAP request to the InsertCategoria SOAP service.
 *
 * @author acoexo
 * @version 1.0
 */

// Set the location of the WSDL file
$location = "http://localhost:3000/InsertCategoria.php?wsdl";

// Define the SOAP request
$request = "
<soapenv:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:ins=\"InsertCategoriaSOAP\">
   <soapenv:Header/>
   <soapenv:Body>
      <ins:InsertCategoriaService soapenv:encodingStyle=\"http://schemas.xmlsoap.org/soap/encoding/\">
         <InsertCategoria xsi:type=\"ins:InsertCategoria\">
            <!--You may enter the following 3 items in any order-->
            <usu_nom xsi:type=\"xsd:string\">Juan</usu_nom>
            <usu_ape xsi:type=\"xsd:string\">Herrero</usu_ape>
            <usu_correo xsi:type=\"xsd:string\">juanpe@gmail.com</usu_correo>
         </InsertCategoria>
      </ins:InsertCategoriaService>
   </soapenv:Body>
</soapenv:Envelope>
";

// Print the SOAP request
print("Request: <br>");
print("<pre>".htmlentities($request)."</pre>");

// Set cURL options
$action = "InsertCatergoriaService";
$header = [
    'Method: POST',
    'Connection: Keep-Alive',
    'User-Agent: PHP-SOAP-CURL',
    'Content-type: text/xml; charset=utf-8',
    'SOAPAction: "guardarSoapService"',
];
$ch = curl_init($location);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

// Execute cURL request and get the response
$response = curl_exec($ch);
$err_status = curl_errno($ch);

// Print the cURL response
print("Response: <br>");
print("<pre>".$response."</pre>");

// Close cURL session
curl_close($ch);
?>

<?php
namespace AirAtlantique\GeneratorBundle\Service;
class FlightException {

	function FlightException ($error) {
        $fp = fopen("errorFlight.log", "a");
        fputs($fp,"\n");
        fputs($fp,$error);
        fclose($fp);
    }

}

?>
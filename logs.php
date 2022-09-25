<?php

//Aquí creamos el archivo log, nos informará qué usuario entró a la página y que errores tuvieron
class Log
{
    private $filelog;

    public function __construct($path)
    {
        $this->filelog= fopen($path, "a");
    }

    public function writeline($type, $message)
    {
        $date = new DateTime();
        fputs($this->filelog, "[".$type."] [".$date->format("d-m-y H:i:s")."]: ".$message."\n");
    }

    public function close()
    {
        fclose($this->filelog);
    }
}

// $log=new Log("log.txt");
// // $log->writeline("E", "Error de loggin");
// // $log->writeline("I", "Todo correcto, usuario ingreso a la página ");
// // $log->writeline("L", "Usuario cerró la sesión");
// $log->close();

?>

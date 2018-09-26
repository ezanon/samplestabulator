<?php

class samplesFile {
    
    private $fOrigem;
    
    public function __construct($arq = false) {
        if ($arq) {
            $this->openFile($arq);
            return true;    
        }
        else {
            return false;            
        }
    }
    
    public function __destruct() {
        $this->closeFile();
        return true;
    }

    public function openFile($arq){
        $this->fOrigem = fopen($arq,'r');
        $arq2 = explode('.',$arq);
        $arq2 = 'tab_' . $arq2[0] . '.csv';
        $this->arqSaida = $arq2;
    }
    
    public function closeFile() {
        fclose($this->fOrigem);
        return true;
    }
    
    public function getValues($table,$col) {
        if ($this->fOrigem){
            $i = 1;
            $this->header[] = 'Element'; // nomes das colunas
            while (($buffer = fgets($this->fOrigem))) { 
                
                if (strpos($buffer, 'Comment')) { // achou cabecalho da coluna
                    $buffer = trim(preg_replace('/( )+/', ' ', $buffer));
                    $dados = explode(':',$buffer); // divide a linha
                    $this->header[] = $dados[2];                     
                    continue;
                }
                
                if (strpos($buffer, $table)){ // está na tabela alvo
                    while (($buffer = fgets($this->fOrigem))) {
                        $buffer = trim(preg_replace('/( )+/', ' ', $buffer));
                        if ((empty($buffer)) or (substr_count($buffer, "---------")>0)) continue; //linha vazia
                        $dados = explode(' ',$buffer); // divide a linha
                        $value = $dados[$col-1]; // obtem valor  
                        $element = $dados[0];
                        $this->tabulado[$element][$i] = $value;   
                        if (strpos($buffer, 'otal')){ // está na última linha da tabela
                            break;
                        }
                    }                   
                }
                else continue;  
                $i++;
            }
        }
        return true;
    }
    
    public function putCSV(){
        $this->table = '';
        $row = implode(";", $this->header) . "\n";
        $this->table.= $row;
        foreach ($this->tabulado as $element=>$values){
            $row = "$element;" . implode(";", $values) . "\n";
            $this->table.=$row;
        }
        return true;
    }
    
    public function download(){
        header("Content-type: application/vnd.ms-excel");
        header("Content-type: application/force-download");
        header("Content-Disposition: attachment; filename={$this->arqSaida}");
        header("Pragma: no-cache");
        echo $this->table;
        return true;
    }
}

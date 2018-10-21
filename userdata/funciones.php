<?php
class Funciones {
	public $variable_publica = 'variable publica';
	private $variable_privada = 'variable privada';
	protected $variable_protejida = 'Variable protejida'; 
	public static $variable_Estatica='Varible statica';
	const constante = 'Hola como estas';

	public  function llenarCombo(){
		$this->variable_privada; #Solo para hacer referencia al Objeto de la misma clase.
		self::$variable_Estatica; #Solo cuando la variable es statica y pertenece a la clase.
		parent::$variable_Estatica; #Solo cuando la variable es estatica pero es heredada.
	}


}



class Dependiencia extends Funciones{
     public $queso = 'Hola';
}



abstract class ClasePrivada{

	public $hola = 'Hola';
    abstract function metodoAbstracto1();

    public function metodoNoAbstracto($num1,$num2){
    	return $num1 + $num2;
    }



}


#$clase_Abstracta = new ClasePrivada();

class UnionClase extends ClasePrivada{
   public function metodoAbstracto1(){
   		return self::metodoNoAbstracto(1,2);
   }


   public function Queso(){
   	   return self::metodoAbstracto1();
   }


   function __construct(){
   	print 'aqui';
   }


   function __destruct(){
   	print 'se destruyo';
   }
}



$claseUnion = new UnionClase();
print $claseUnion->Queso();




$funciones = new Funciones();
print $funciones->variable_publica;
print Funciones::$variable_Estatica;


$dependiencia = new Dependiencia();
print $dependiencia->variable_publica;
print $dependiencia->constante;
?>

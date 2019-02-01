var num1 = 2;
var num2 = 8;
var cadena = null;

    //submit
    function comp(){
        //num1 = document.getElementById("var1").value;
        //num2 = document.getElementById("var2").value;
        
        if (num1<=num2) {
            cadena = "numero1 no es mayor que numero2";
            return cadena;
        }

        if (num2>0) {
            cadena = "numero2 es mayor que cero";
            return cadena;
        }

        if (num1<=0 || num1 != 0) {
            cadena = "numero1 es negativo o distinto de cero";
            return cadena;
        }

        if ((num1+1)<num2) {
            cadena = "Incrementar en 1 unidad el valor de numero1 no lo hace mayor o igual que numero2";
            return cadena;
        }

        alert(cadena);

    }
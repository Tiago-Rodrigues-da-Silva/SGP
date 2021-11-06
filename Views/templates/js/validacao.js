function validaCampo(){
    var tipoDeValidacao = document.getElementById("tipo").value;


    if (tipoDeValidacao == "cnpj"){
        var valorValidar = document.getElementById("pesquisaCnpj").value;
        if (validaCpfCnpj(valorValidar)){
            return true;
        } else{
           return false;
        }
    } else if (tipoDeValidacao == "cpf"){
        var valorValidar = document.getElementById("pesquisaCpf").value;
        if (validaCpfCnpj(valorValidar)){
            return true;
        } else{
           return false;
        }
    } else if (tipoDeValidacao == "processo"){
        var valorValidar = document.getElementById("pesquisaProcesso").value;
        if (validaProcesso(valorValidar)){
            return true;
        } else{
           return false;
        }
    }

}

function validaCpfCnpj(val) {
    if (val.length == 14) {
        var cpf = val.trim();
     
        cpf = cpf.replace(/\./g, '');
        cpf = cpf.replace('-', '');
        cpf = cpf.split('');
        
        var v1 = 0;
        var v2 = 0;
        var aux = false;
        
        for (var i = 1; cpf.length > i; i++) {
            if (cpf[i - 1] != cpf[i]) {
                aux = true;   
            }
        } 
        
        if (aux == false) {
            return false; 
        } 
        
        for (var i = 0, p = 10; (cpf.length - 2) > i; i++, p--) {
            v1 += cpf[i] * p; 
        } 
        
        v1 = ((v1 * 10) % 11);
        
        if (v1 == 10) {
            v1 = 0; 
        }
        
        if (v1 != cpf[9]) {
            return false; 
        } 
        
        for (var i = 0, p = 11; (cpf.length - 1) > i; i++, p--) {
            v2 += cpf[i] * p; 
        } 
        
        v2 = ((v2 * 10) % 11);
        
        if (v2 == 10) {
            v2 = 0; 
        }
        
        if (v2 != cpf[10]) {
            return false; 
        } else {   
            return true; 
        }
    } else if (val.length == 18) {
        var cnpj = val.trim();
        
        cnpj = cnpj.replace(/\./g, '');
        cnpj = cnpj.replace('-', '');
        cnpj = cnpj.replace('/', ''); 
        cnpj = cnpj.split(''); 
        
        var v1 = 0;
        var v2 = 0;
        var aux = false;
        
        for (var i = 1; cnpj.length > i; i++) { 
            if (cnpj[i - 1] != cnpj[i]) {  
                aux = true;   
            } 
        } 
        
        if (aux == false) {  
            return false; 
        }
        
        for (var i = 0, p1 = 5, p2 = 13; (cnpj.length - 2) > i; i++, p1--, p2--) {
            if (p1 >= 2) {  
                v1 += cnpj[i] * p1;  
            } else {  
                v1 += cnpj[i] * p2;  
            } 
        } 
        
        v1 = (v1 % 11);
        
        if (v1 < 2) { 
            v1 = 0; 
        } else { 
            v1 = (11 - v1); 
        } 
        
        if (v1 != cnpj[12]) {  
            return false; 
        } 
        
        for (var i = 0, p1 = 6, p2 = 14; (cnpj.length - 1) > i; i++, p1--, p2--) { 
            if (p1 >= 2) {  
                v2 += cnpj[i] * p1;  
            } else {   
                v2 += cnpj[i] * p2; 
            } 
        }
        
        v2 = (v2 % 11); 
        
        if (v2 < 2) {  
            v2 = 0;
        } else { 
            v2 = (11 - v2); 
        } 
        
        if (v2 != cnpj[13]) {   
            return false; 
        } else {  
            return true; 
        }
    } else {
        return false;
    }
 }


 function validaProcesso(numero) {
    const bcmod = (x, y) =>
    {
      const take = 5;
      let mod = '';
  
      do
      {
        let a = parseInt(mod + x.substr(0, take));
        x = x.substr(take);
        mod = a % y;
      }
      while (x.length);
  
      return mod;
    };
  
    // remove todos os pontos e traços
    const numeroProcesso = numero.replace(/[.-]/g, '')
  
    if (numeroProcesso.length < 14 || isNaN(numeroProcesso)) {
      return false;
    }
  
    const digitoVerificadorExtraido = parseInt(numeroProcesso.substr(-13, 2));
  
    const vara = numeroProcesso.substr(-4, 4);  // (4) vara originária do processo
    const tribunal = numeroProcesso.substr(-6, 2);  // (2) tribunal
    const ramo = numeroProcesso.substr(-7, 1);  // (1) ramo da justiça
    const anoInicio = numeroProcesso.substr(-11, 4);  // (4) ano de inicio do processo
    const tamanho = numeroProcesso.length - 13;
    const numeroSequencial = numeroProcesso.substr(0, tamanho).padStart(7, '0');  // (7) numero sequencial dado pela vara ou juizo de origem
  
    const digitoVerificadorCalculado = 98 - bcmod((numeroSequencial + anoInicio + ramo + tribunal + vara + '00'), '97');
  
    return digitoVerificadorExtraido === digitoVerificadorCalculado;
  }



$("#pesquisaCnpj").on("keyup", function(e)
{
    $(this).val(
        $(this).val()
        .replace(/\D/g, '')
        .replace(/^(\d{2})(\d{3})?(\d{3})?(\d{4})?(\d{2})?/, "$1.$2.$3/$4-$5"));
});

$("#pesquisaCpf").on("keyup", function(e)
{
    $(this).val(
        $(this).val()
        .replace(/\D/g, '')
        .replace(/^(\d{3})(\d{3})?(\d{3})?(\d{2})?/, "$1.$2.$3-$4"));
});

$("#pesquisaProcesso").on("keyup", function(e)
{
    $(this).val(
        $(this).val()
        .replace(/\D/g, '')
        .replace(/^(\d{7})(\d{2})?(\d{4})?(\d{1})?(\d{2})?(\d{4})?/, "$1-$2.$3.$4.$5.$6"));
});

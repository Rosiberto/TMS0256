function ValidaData (){
    const Dt_inicial = document.getElementById("Dt_inicial").value;
    const Dt_final = document.getElementById("Dt_final").value;  
    const DestinoEstado = document.getElementById("destino_estado").value; 
    const CapacidadePessoa = document.getElementById("Capacidade_Pessoa").value;                 
    if (Dt_final < Dt_inicial) {
      window.alert("Por gentileza, ajustar a data.");
    }
    else {
      aplicaFiltro(Dt_inicial,Dt_final,DestinoEstado,CapacidadePessoa);
      window.location.href = "imoveisFiltro.html";
    }
  }

  function aplicaFiltro(Dt_inicial,Dt_final,DestinoEstado,CapacidadePessoa){
    const consultaSQL = "select * from quarto where (capacidade_pessoa >= CapacidadePessoa"

  }
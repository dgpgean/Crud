function deletar(event, form){
    event.preventDefault();
    const result = confirm('Confirmar deleção? ');
    if(result){
        form.submit();
    }
  }

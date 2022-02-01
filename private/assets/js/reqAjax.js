function openArt($id){
    $.ajax({
      url: "controller/ajaxController.php",
      type: "get",
      data: {
          idArt: $id,
      },
      success: function(result){
        console.log('in function');
        openArt();
      }
  });
}
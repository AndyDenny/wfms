$(".delete").on("click",function () {
   var res = confirm("Продолжить?");
   if(!res) return false;
});

$('.sidebar-menu a').each(function(){
   var mylocation = window.location.protocol + '//' + window.location.host + window.location.pathname
   var link = this.href;
   if(link == mylocation){
      $(this).parent().addClass("active");
      $(this).closest('.treeview').addClass("active");
   }
});
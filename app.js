
var images = ["https://images.unsplash.com/photo-1529156069898-49953e39b3ac?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1489&q=80","https://images.unsplash.com/photo-1506869640319-fe1a24fd76dc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80","https://images.unsplash.com/photo-1472393365320-db77a5abbecc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"];

display_gallery =document.querySelector('.display-gallery img');
display_gallery.addEventListener('click',function(){
  var i = Math.random()*3;
  console.log(i);
  i = Math.floor(i);
  display_gallery.setAttribute('src', images[i]);
})
let cost = document.getElementsByName('cost');
let quantity = document.getElementsByName('quantity');
let subtotal = document.getElementsByName('subtotal');
//let totalPrice = 0;
let sum = document.getElementById('sum');
let items = document.getElementsByName('item');

for (let i = 0; i < items.length; i++) {
   
   quantity[i].addEventListener('blur', function() {
   let count = parseInt(quantity[i].value, 10);
   subtotal[i].innerHTML ='<td>' + parseInt(cost[i].textContent,10) * count + '円</td>';
   let totalPrice = 0;
   for (let j = 0; j < items.length; j++) {
      totalPrice += parseInt(subtotal[j].textContent, 10);
   }
   sum.innerHTML = '<h3>' + totalPrice + '円</h3>';

   });
}



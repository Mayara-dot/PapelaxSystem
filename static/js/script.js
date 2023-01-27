const DVDForm = document.querySelector('#DVDForm');
const FurnitureForm = document.querySelector('#FurnitureForm');
const BookForm = document.querySelector('#BookForm');
function myFunction() {
    var som = document.getElementById('productType');
    var somevalue = som.value;
    if(somevalue == "DVD") {
    //remove the style attribute for de DVD Form
    DVDForm.removeAttribute('style');
    //set the style attribute for Furniture Form and Book Form
    FurnitureForm.setAttribute('style', 'display:none');
    BookForm.setAttribute('style', 'display:none');
    //remove required attribute from  Furniture Form
    document.getElementById('height').removeAttribute('required');
    document.getElementById('width').removeAttribute('required');
    document.getElementById('length').removeAttribute('required');
    //remove required attribute from Book Form
    document.getElementById('weight').removeAttribute('required');
    } else if (somevalue == "Book") {
    //remove the style attribute for de Book Form
    BookForm.removeAttribute('style');
    //set the style attribute for Furniture Form and DVD Form
    FurnitureForm.setAttribute('style', 'display:none');
    DVDForm.setAttribute('style', 'display:none');
    //remove required attribute from DVD Form
    document.getElementById('size').removeAttribute('required');
    //remove required attribute from  Furniture Form
    document.getElementById('height').removeAttribute('required');
    document.getElementById('width').removeAttribute('required');
    document.getElementById('length').removeAttribute('required');

    } else {
        //remove the style attribute for de Furniture Form
        FurnitureForm.removeAttribute('style');
        //set the style attribute for DVD Form and Book Form
        DVDForm.setAttribute('style', 'display:none');
        BookForm.setAttribute('style', 'display:none');
        //remove required attribute from DVD Form
        document.getElementById('size').removeAttribute('required');
        //remove required attribute from Book Form
        document.getElementById('weight').removeAttribute('required');

    }
}
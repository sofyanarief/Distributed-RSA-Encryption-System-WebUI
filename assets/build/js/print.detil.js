function prepareDataToPrint(){
	divToPrint = document.getElementById('demo-form2').cloneNode(true);
	document.getElementById('print-area').replaceChild(divToPrint,document.getElementById('print-area').childNodes[0]);
	window.print();
}
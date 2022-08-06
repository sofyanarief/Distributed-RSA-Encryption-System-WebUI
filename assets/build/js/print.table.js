function prepareDataToPrint(){
	divToPrint = document.getElementById('konten').querySelector('#datatable-fixed-header').cloneNode(true);
	document.getElementById('print-area').replaceChild(divToPrint,document.getElementById('print-area').childNodes[0]);
	rows = divToPrint.rows;
	for (var i = 0; i < rows.length; i++) {
		rows[i].deleteCell(-1);
	}
	window.print();
}
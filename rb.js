// Joseph Sturzenegger u0378425 ps3

// Inserts textboxes for additional employment history
// details when the user clicks the "Add Job" button
var rowID = 20;
//views the resume from the database
function getResumeName(resumename) 
{
	window.open("resume.php?name=" + resumename);
}


//Builds a job set including start and end dates and a description
function addJob() {
	var table = document.getElementById("History");
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);
	row.setAttribute("ID", "job" + rowID);
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
	var cell3 = row.insertCell(2);
	var cell4 = row.insertCell(3);
	var textbox1 = document.createElement('input');
	textbox1.setAttribute("type", "text");
	textbox1.setAttribute("size", "10");
	textbox1.setAttribute("name", "Start[]");
	cell1.appendChild(textbox1);
	
	var textbox2 = document.createElement('input');
	textbox2.setAttribute("type", "text");
	textbox2.setAttribute("size", "10");
	textbox2.setAttribute("name", "End[]");
	cell2.appendChild(textbox2);
	
	var textbox3 = document.createElement('textarea');
	textbox3.setAttribute("rows", "3");
	textbox3.setAttribute("cols", "50");
	textbox3.setAttribute("name", "Job[]");
	cell3.appendChild(textbox3);
	var rowCount_plus1 = rowCount+1;
	var button1 = document.createElement('input');
	button1.setAttribute("type", "button");
	button1.setAttribute("name", "btnRemoveJob");
	button1.setAttribute("value", "Remove Job");
	button1.setAttribute("onclick", "deleteJob('job"+ rowID +"')");
	cell4.appendChild(button1);
	rowID = rowID + 1;
}
// delte a joblisting in the table
function deleteJob(rowident)  
{   
    var row = document.getElementById(rowident);
    var table = row.parentNode;
    while ( table && table.tagName != 'TABLE' )
        table = table.parentNode;
    if ( !table )
        return;
    table.deleteRow(row.rowIndex);
}
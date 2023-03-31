// JavaScript Document
function autof_card (args)
{
	var request = '?c='+args;
	location.assign(request);
}

function autof_stmt (args)
{
	var request = '&s='+args;
	location.href += request;
}

function autof_cr (args)
{
	var request = '&cr='+args;
	location.href += request;
}

function autof_dr (args)
{
	var request = '&dr='+args;
	location.href += request;
}
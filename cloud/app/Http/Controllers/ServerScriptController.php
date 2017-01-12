<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// DataTables PHP library
include( "../../php/DataTables.php" );
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate;

class ServerScriptController extends Controller
{
    protected function data(){
		// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'datatables_demo' )
    ->fields(
        Field::inst( 'product_name' )->validator( 'Validate::notEmpty' ),
        Field::inst( 'quantity_in_stock' )
            ->validator( 'Validate::numeric' )
            ->setFormatter( 'Format::ifEmpty', null ),
		Field::inst( 'product_price' )
            ->validator( 'Validate::numeric' )
            ->setFormatter( 'Format::ifEmpty', null ),
		  Field::inst( 'date' )
            ->validator( 'Validate::dateFormat', array(
                "format"  => Format::DATE_ISO_8601,
                "message" => "Please enter a date in the format yyyy-mm-dd"
            ) )
            ->getFormatter( 'Format::date_sql_to_format', Format::DATE_ISO_8601 )
            ->setFormatter( 'Format::date_format_to_sql', Format::DATE_ISO_8601 ),
			Field::inst( 'total' )
            ->validator( 'Validate::numeric' )
            ->setFormatter( 'Format::ifEmpty', null )	
    )
    ->process( $_POST )
    ->json();
		
		
		
	}
}

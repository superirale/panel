<?php
namespace App\Http\Controllers;

use App\Contact;
use \League\Csv\Writer;
use \League\Csv\Reader;
use Illuminate\Http\Request;


class FileController extends Controller
{

	function __construct()
	{
		# code...
	}

	public function index()
	{
		return view('contacts.upload');
	}

	public function exportContacts()
	{

		$csv = Writer::createFromFileObject(new \SplTempFileObject());
		$csv->insertOne(\Schema::getColumnListing('Contacts'));

		Contact::all()->each(function($contact) use($csv) {
            $csv->insertOne($contact->toArray());
        });

		$csv->output('contacts.csv');
	}

	public function importContacts(Request $request)
	{
		$reader = Reader::createFromPath($request->file('file'));

		$results = $reader->fetch();

		$count = 0;

		foreach ($results as $row) {
			//put isset check in the row elements
			if($count > 0){
				$contact = new Contact();
				$contact->first_name = $row[0];
				$contact->last_name = $row[1];
				$contact->sex = $row[2];
				$contact->age = $row[3];
				$contact->email = $row[4];
				$contact->phone = $row[5];
				$contact->address = $row[6];
				$saved = $contact->save();
			}

		    $count++;
		}
		return redirect('contacts');;
	}
}
<?php
namespace App\Http\Controllers;

use App\Contact;
use App\ListContact;
use \League\Csv\Writer;
use \League\Csv\Reader;
use Illuminate\Http\Request;


class FileController extends Controller
{

	function __construct()
	{
		# code...
	}

	public function index($contact_list_id = null)
	{
		return view('contacts.upload', compact('contact_list_id'));
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

	public function importContacts(Request $request, $contact_list_id = null)
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
				$contact->age = is_int($row[3])? $row[3]: null;
				$contact->email = $row[4];
				$contact->phone = $row[5];
				$contact->address = $row[6];
				$saved = $contact->save();

				if($contact_list_id != null){

					ListContact::create(['list_id' => $contact_list_id, 'contact_id' => $contact->id]);
				}
			}

		    $count++;
		}
		return redirect('contacts');;
	}


	public function nameFieldImport(Request $request, $id)
	{
		$reader = Reader::createFromPath($request->file('file'));

		$keys = ['first_name', 'phone'];
		$results = $reader->fetchAssoc($keys);
		$count = 0;
		foreach ($results as $row) {

			if($count > 0){
				$contact = new Contact();
				$contact->first_name = $row['first_name'];
				$contact->last_name = "";
				$contact->email = "";
				$contact->address = "";
				$contact->sex = "";
				$contact->age = null;
				$contact->phone = trim($row['phone']);
				$saved = $contact->save();

				ListContact::create(['list_id' => $id, 'contact_id' => $contact->id]);
			}

			$count++;
		}

		return response()->json(['status' => 'success']);
	}
}
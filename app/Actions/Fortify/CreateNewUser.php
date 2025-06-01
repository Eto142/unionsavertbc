<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Mail\welcomeEmail;
use App\Models\verifyToken;
use App\Mail\VerificationEmail;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'account_pin' => ['required', 'string', 'max:255'],
            'account_type' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        
        
                       $validToken = rand(7650, 1234);

        
                        if ( $input['country'] == "Afghanistan" ){ $currency = '؋'; }
                        else if ( $input['country'] == "Albania" ){ $currency = 'Lek'; }
                        else if ( $input['country'] == "Algeria" ){ $currency = 'دج'; }
                        else if ( $input['country'] == "American Samoa" ){ $currency = '$'; }
                        else if ( $input['country'] == "Andorra" ){ $currency = '€'; }
                        else if ( $input['country'] == "Angola" ){ $currency = 'Kz'; }
                        else if ( $input['country'] == "Anguilla" ){ $currency = '$'; }
                        else if ( $input['country'] == "Antarctica" ){ $currency = '$'; }
                        else if ( $input['country'] == "Antigua and Barbuda" ){ $currency = '$'; }
                        else if ( $input['country'] == "Argentina" ){ $currency = '$'; }
                        else if ( $input['country'] == "Armenia" ){ $currency = '֏'; }
                        else if ( $input['country'] == "Aruba" ){ $currency = 'ƒ'; }
                        else if ( $input['country'] == "Australia" ){ $currency = '$'; }
                        else if ( $input['country'] == "Austria" ){ $currency = '€'; }
                        else if ( $input['country'] == "Azerbaijan" ){ $currency = 'AZN'; }
                        else if ( $input['country'] == "Bahamas" ){ $currency = '$'; }
                        else if ( $input['country'] == "Bahrain" ){ $currency = 'د.'; }
                        else if ( $input['country'] == "Bangladesh" ){ $currency = 'ó'; }
                        else if ( $input['country'] == "Barbados" ){ $currency = '$'; }
                        else if ( $input['country'] == "Belarus" ){ $currency = 'Br'; }
                        else if ( $input['country'] == "Belgium" ){ $currency = '€'; }
                        else if ( $input['country'] == "Belize" ){ $currency = '$'; }
                        else if ( $input['country'] == "Benin" ){ $currency = 'CFA'; }
                        else if ( $input['country'] == "Bermuda" ){ $currency = '$'; }
                        else if ( $input['country'] == "Bhutan" ){ $currency = 'Nu'; }
                        else if ( $input['country'] == "Bolivia" ){ $currency = 'Bs'; }
                        else if ( $input['country'] == "Bosnia and Herzegovina" ){ $currency = 'KM'; }
                        else if ( $input['country'] == "Botswana" ){ $currency = 'P'; }
                        else if ( $input['country'] == "Bouvet Island" ){ $currency = 'kr'; }
                        else if ( $input['country'] == "Brazil" ){ $currency = 'R$'; }
                        else if ( $input['country'] == "British Indian Ocean Territory" ){ $currency = '$'; }
                        else if ( $input['country'] == "Brunei Darussalam" ){ $currency = 'B$'; }
                        else if ( $input['country'] == "Bulgaria" ){ $currency = 'Лв.'; }
                        else if ( $input['country'] == "Burkina Faso" ){ $currency = 'CFA'; }
                        else if ( $input['country'] == "Burundi" ){ $currency = 'FBu'; }
                        else if ( $input['country'] == "Cambodia" ){ $currency = '៛'; }
                        else if ( $input['country'] == "Cameroon" ){ $currency = 'FCFA'; }
                        else if ( $input['country'] == "Canada" ){ $currency = '$'; }
                        else if ( $input['country'] == "Cape Verde" ){ $currency = '$'; }
                        else if ( $input['country'] == "Cayman Islands" ){ $currency = '$'; }
                        else if ( $input['country'] == "Central African Republic" ){ $currency = 'FCFA'; }
                        else if ( $input['country'] == "Chad" ){ $currency = 'FCFA'; }
                        else if ( $input['country'] == "Chile" ){ $currency = '$'; }
                        else if ( $input['country'] == "China" ){ $currency = '¥'; }
                        else if ( $input['country'] == "Christmas Island" ){ $currency = '$'; }
                        else if ( $input['country'] == "Cocos (Keeling) Islands" ){ $currency = '$'; }
                        else if ( $input['country'] == "Colombia" ){ $currency = '$'; }
                        else if ( $input['country'] == "Comoros" ){ $currency = 'CF'; }
                        else if ( $input['country'] == "Congo" ){ $currency = 'FC'; }
                        else if ( $input['country'] == "Democratic Republic of the Congo" ){ $currency = 'FC'; }
                        else if ( $input['country'] == "Cook Islands" ){ $currency = '$'; }
                        else if ( $input['country'] == "Costa Rica" ){ $currency = '₡'; }
                        else if ( $input['country'] == "Cote D'Ivoire" ){ $currency = 'CFA'; }
                        else if ( $input['country'] == "Croatia" ){ $currency = 'Kn'; }
                        else if ( $input['country'] == "Cuba" ){ $currency = '$'; }
                        else if ( $input['country'] == "Cyprus" ){ $currency = '€'; }
                        else if ( $input['country'] == "Czech Republic" ){ $currency = 'Kč'; }
                        else if ( $input['country'] == "Denmark" ){ $currency = 'kr'; }
                        else if ( $input['country'] == "Djibouti" ){ $currency = 'Fdj'; }
                        else if ( $input['country'] == "Dominica" ){ $currency = '$'; }
                        else if ( $input['country'] == "Dominican Republic" ){ $currency = 'RD$'; }
                        else if ( $input['country'] == "Ecuador" ){ $currency = 'S/.'; }
                        else if ( $input['country'] == "Egypt" ){ $currency = 'E£'; }
                        else if ( $input['country'] == "El Salvador" ){ $currency = '₡'; }
                        else if ( $input['country'] == "Equatorial Guinea" ){ $currency = 'FCFA'; }
                        else if ( $input['country'] == "Eritrea" ){ $currency = 'Nkf'; }
                        else if ( $input['country'] == "Estonia" ){ $currency = 'kr'; }
                        else if ( $input['country'] == "Ethiopia" ){ $currency = 'Br'; }
                        else if ( $input['country'] == "Falkland Islands (Malvinas)" ){ $currency = '£'; }
                        else if ( $input['country'] == "Faroe Islands" ){ $currency = 'kr'; }
                        else if ( $input['country'] == "Fiji" ){ $currency = 'FJ$'; }
                        else if ( $input['country'] == "Finland" ){ $currency = 'mk'; }
                        else if ( $input['country'] == "France" ){ $currency = '€'; }
                        else if ( $input['country'] == "French Guiana" ){ $currency = '€'; }
                        else if ( $input['country'] == "French Polynesia" ){ $currency = '₣'; }
                        else if ( $input['country'] == "French Southern Territories" ){ $currency = '€'; }
                        else if ( $input['country'] == "Gabon" ){ $currency = 'FCFA'; }
                        else if ( $input['country'] == "Gambia" ){ $currency = 'D'; }
                        else if ( $input['country'] == "Georgia" ){ $currency = 'GEL'; }
                        else if ( $input['country'] == "Germany" ){ $currency = '€'; }
                        else if ( $input['country'] == "Ghana" ){ $currency = 'GH₵'; }
                        else if ( $input['country'] == "Gibraltar" ){ $currency = '£'; }
                        else if ( $input['country'] == "Greece" ){ $currency = '€'; }
                        else if ( $input['country'] == "Greenland" ){ $currency = 'Kr.'; }
                        else if ( $input['country'] == "Grenada" ){ $currency = '$'; }
                        else if ( $input['country'] == "Guadeloupe" ){ $currency = '€'; }
                        else if ( $input['country'] == "Guam" ){ $currency = '$'; }
                        else if ( $input['country'] == "Guatemala" ){ $currency = 'Q'; }
                        else if ( $input['country'] == "Guernsey" ){ $currency = '£'; }
                        else if ( $input['country'] == "Guinea" ){ $currency = 'FG'; }
                        else if ( $input['country'] == "Guinea-Bissau" ){ $currency = 'CFA'; }
                        else if ( $input['country'] == "Guyana" ){ $currency = 'G$'; }
                        else if ( $input['country'] == "Haiti" ){ $currency = 'G'; }
                        else if ( $input['country'] == "Heard Island and McDonald Islands" ){ $currency = '$'; }
                        else if ( $input['country'] == "Holy See (Vatican City State)" ){ $currency = '₤'; }
                        else if ( $input['country'] == "Honduras" ){ $currency = 'HNL'; }
                        else if ( $input['country'] == "Hong Kong" ){ $currency = 'HK$'; }
                        else if ( $input['country'] == "Hungary" ){ $currency = 'Ft'; }
                        else if ( $input['country'] == "Iceland" ){ $currency = 'kr'; }
                        else if ( $input['country'] == "India" ){ $currency = '₹'; }
                        else if ( $input['country'] == "Indonesia" ){ $currency = 'Rp'; }
                        else if ( $input['country'] == "Islamic Republic of Iran" ){ $currency = 'IRR'; }
                        else if ( $input['country'] == "Iraq" ){ $currency = 'د.ع'; }
                        else if ( $input['country'] == "Ireland" ){ $currency = '€'; }
                        else if ( $input['country'] == "Isle of Man" ){ $currency = '£'; }
                        else if ( $input['country'] == "Israel" ){ $currency = '₪'; }
                        else if ( $input['country'] == "Italy" ){ $currency = '€'; }
                        else if ( $input['country'] == "Jamaica" ){ $currency = 'J$'; }
                        else if ( $input['country'] == "Japan" ){ $currency = '¥'; }
                        else if ( $input['country'] == "Jersey" ){ $currency = '£'; }
                        else if ( $input['country'] == "Jordan" ){ $currency = 'د.ا'; }
                        else if ( $input['country'] == "Kazakhstan" ){ $currency = '₸'; }
                        else if ( $input['country'] == "Kenya" ){ $currency = 'KSh'; }
                        else if ( $input['country'] == "Kiribati" ){ $currency = '$'; }
                        else if ( $input['country'] == "Democratic People's Republic of Korea" ){ $currency = '₩'; }
                        else if ( $input['country'] == "Republic of Korea" ){ $currency = '₩'; }
                        else if ( $input['country'] == "Kuwait" ){ $currency = 'د.ك'; }
                        else if ( $input['country'] == "Kyrgyzstan" ){ $currency = 'лв'; }
                        else if ( $input['country'] == "Lao People's Democratic Republic" ){ $currency = '₭'; }
                        else if ( $input['country'] == "Latvia" ){ $currency = 'LVL'; }
                        else if ( $input['country'] == "Lebanon" ){ $currency = 'ل.ل'; }
                        else if ( $input['country'] == "Lesotho" ){ $currency = 'L'; }
                        else if ( $input['country'] == "Liberia" ){ $currency = 'L$'; }
                        else if ( $input['country'] == "Libyan Arab Jamahiriya" ){ $currency = 'LD'; }
                        else if ( $input['country'] == "Liechtenstein" ){ $currency = 'CHF'; }
                        else if ( $input['country'] == "Lithuania" ){ $currency = 'Lt'; }
                        else if ( $input['country'] == "Luxembourg" ){ $currency = '€'; }
                        else if ( $input['country'] == "Macao" ){ $currency = 'MOP$'; }
                        else if ( $input['country'] == "The Former Yugoslav Republic of Macedonia" ){ $currency = 'den'; }
                        else if ( $input['country'] == "Madagascar" ){ $currency = 'Ar'; }
                        else if ( $input['country'] == "Malawi" ){ $currency = 'K'; }
                        else if ( $input['country'] == "Malaysia" ){ $currency = 'RM'; }
                        else if ( $input['country'] == "Maldives" ){ $currency = 'Rf'; }
                        else if ( $input['country'] == "Mali" ){ $currency = 'MAF'; }
                        else if ( $input['country'] == "Malta" ){ $currency = '€'; }
                        else if ( $input['country'] == "Marshall Islands" ){ $currency = '$'; }
                        else if ( $input['country'] == "Martinique" ){ $currency = '€'; }
                        else if ( $input['country'] == "Mauritania" ){ $currency = 'MRU'; }
                        else if ( $input['country'] == "Mauritius" ){ $currency = '₨'; }
                        else if ( $input['country'] == "Mayotte" ){ $currency = '€'; }
                        else if ( $input['country'] == "Mexico" ){ $currency = '$'; }
                        else if ( $input['country'] == "Federated States of Micronesia" ){ $currency = '$'; }
                        else if ( $input['country'] == "Republic of Moldova" ){ $currency = 'L'; }
                        else if ( $input['country'] == "Monaco" ){ $currency = '€'; }
                        else if ( $input['country'] == "Mongolia" ){ $currency = '₮'; }
                        else if ( $input['country'] == "Montenegro" ){ $currency = '€'; }
                        else if ( $input['country'] == "Montserrat" ){ $currency = '$'; }
                        else if ( $input['country'] == "Morocco" ){ $currency = 'MAD'; }
                        else if ( $input['country'] == "Mozambique" ){ $currency = 'MT'; }
                        else if ( $input['country'] == "Myanmar" ){ $currency = 'K'; }
                        else if ( $input['country'] == "Namibia" ){ $currency = 'N$'; }
                        else if ( $input['country'] == "Nauru" ){ $currency = '$'; }
                        else if ( $input['country'] == "Nepal" ){ $currency = 'Rs'; }
                        else if ( $input['country'] == "Netherlands" ){ $currency = 'ANG'; }
                        else if ( $input['country'] == "Netherlands Antilles" ){ $currency = 'NAf'; }
                        else if ( $input['country'] == "New Caledonia" ){ $currency = '₣'; }
                        else if ( $input['country'] == "New Zealand" ){ $currency = '$'; }
                        else if ( $input['country'] == "Nicaragua" ){ $currency = 'C$'; }
                        else if ( $input['country'] == "Niger" ){ $currency = 'XOF'; }
                        else if ( $input['country'] == "Nigeria" ){ $currency = '₦'; }
                        else if ( $input['country'] == "Niue" ){ $currency = '$'; }
                        else if ( $input['country'] == "Norfolk Island" ){ $currency = '$'; }
                        else if ( $input['country'] == "Northern Mariana Islands" ){ $currency = '$'; }
                        else if ( $input['country'] == "Norway" ){ $currency = 'kr'; }
                        else if ( $input['country'] == "Oman" ){ $currency = 'ر.ع.'; }
                        else if ( $input['country'] == "Pakistan" ){ $currency = '₨'; }
                        else if ( $input['country'] == "Palau" ){ $currency = '$'; }
                        else if ( $input['country'] == "Occupied Palestinian Territory" ){ $currency = '$'; }
                        else if ( $input['country'] == "Panama" ){ $currency = 'B/index.html'; }
                        else if ( $input['country'] == "Papua New Guinea" ){ $currency = 'K'; }
                        else if ( $input['country'] == "Paraguay" ){ $currency = '₲'; }
                        else if ( $input['country'] == "Peru" ){ $currency = 'S/index.html'; }
                        else if ( $input['country'] == "Philippines" ){ $currency = '₱'; }
                        else if ( $input['country'] == "Pitcairn" ){ $currency = '$'; }
                        else if ( $input['country'] == "Poland" ){ $currency = 'zł'; }
                        else if ( $input['country'] == "Portugal" ){ $currency = '€'; }
                        else if ( $input['country'] == "Puerto Rico" ){ $currency = '$'; }
                        else if ( $input['country'] == "Qatar" ){ $currency = 'QR'; }
                        else if ( $input['country'] == "Reunion" ){ $currency = '€'; }
                        else if ( $input['country'] == "Romania" ){ $currency = 'lei'; }
                        else if ( $input['country'] == "Russian Federation" ){ $currency = '₽'; }
                        else if ( $input['country'] == "Rwanda" ){ $currency = 'FRw'; }
                        else if ( $input['country'] == "Saint Barthélemy" ){ $currency = '€'; }
                        else if ( $input['country'] == "Saint Helena" ){ $currency = '£'; }
                        else if ( $input['country'] == "Saint Kitts and Nevis" ){ $currency = '$'; }
                        else if ( $input['country'] == "Saint Lucia" ){ $currency = '$'; }
                        else if ( $input['country'] == "Saint Martin" ){ $currency = 'ƒ'; }
                        else if ( $input['country'] == "Saint Pierre and Miquelon" ){ $currency = '€'; }
                        else if ( $input['country'] == "Saint Vincent and the Grenadines" ){ $currency = 'X$'; }
                        else if ( $input['country'] == "Samoa" ){ $currency = '$'; }
                        else if ( $input['country'] == "San Marino" ){ $currency = '€'; }
                        else if ( $input['country'] == "Sao Tome and Principe" ){ $currency = 'Db'; }
                        else if ( $input['country'] == "Saudi Arabia" ){ $currency = '﷼'; }
                        else if ( $input['country'] == "Senegal" ){ $currency = 'CFA'; }
                        else if ( $input['country'] == "Serbia" ){ $currency = 'din'; }
                        else if ( $input['country'] == "Seychelles" ){ $currency = 'SCR'; }
                        else if ( $input['country'] == "Sierra Leone" ){ $currency = 'Le'; }
                        else if ( $input['country'] == "Singapore" ){ $currency = 'S$'; }
                        else if ( $input['country'] == "Slovakia" ){ $currency = 'SKK'; }
                        else if ( $input['country'] == "Slovenia" ){ $currency = '€'; }
                        else if ( $input['country'] == "Solomon Islands" ){ $currency = 'Si$'; }
                        else if ( $input['country'] == "Somalia" ){ $currency = 'Sh.so.'; }
                        else if ( $input['country'] == "South Africa" ){ $currency = 'R'; }
                        else if ( $input['country'] == "South Georgia and the South Sandwich Islands" ){ $currency = '£'; }
                        else if ( $input['country'] == "Spain" ){ $currency = '€'; }
                        else if ( $input['country'] == "Sri Lanka" ){ $currency = 'Rs'; }
                        else if ( $input['country'] == "Sudan" ){ $currency = '£SD'; }
                        else if ( $input['country'] == "Suriname" ){ $currency = '$'; }
                        else if ( $input['country'] == "Svalbard and Jan Mayen" ){ $currency = 'kr'; }
                        else if ( $input['country'] == "Swaziland" ){ $currency = 'L'; }
                        else if ( $input['country'] == "Sweden" ){ $currency = 'kr'; }
                        else if ( $input['country'] == "Switzerland" ){ $currency = 'CHf'; }
                        else if ( $input['country'] == "Syrian Arab Republic" ){ $currency = 'LS'; }
                        else if ( $input['country'] == "Taiwan, Province Of China" ){ $currency = 'NT$'; }
                        else if ( $input['country'] == "Tajikistan" ){ $currency = 'SM'; }
                        else if ( $input['country'] == "United Republic of Tanzania" ){ $currency = 'TSh'; }
                        else if ( $input['country'] == "Thailand" ){ $currency = '฿)'; }
                        else if ( $input['country'] == "Timor-Leste" ){ $currency = '$'; }
                        else if ( $input['country'] == "Togo" ){ $currency = 'CFA'; }
                        else if ( $input['country'] == "Tokelau" ){ $currency = '$'; }
                        else if ( $input['country'] == "Tonga" ){ $currency = 'T$'; }
                        else if ( $input['country'] == "Trinidad and Tobago" ){ $currency = 'TT$'; }
                        else if ( $input['country'] == "Tunisia" ){ $currency = 'د.ت'; }
                        else if ( $input['country'] == "Turkey" ){ $currency = '₺'; }
                        else if ( $input['country'] == "Turkmenistan" ){ $currency = 'T'; }
                        else if ( $input['country'] == "Turks and Caicos Islands" ){ $currency = '$'; }
                        else if ( $input['country'] == "Tuvalu" ){ $currency = '$'; }
                        else if ( $input['country'] == "Uganda" ){ $currency = 'USh'; }
                        else if ( $input['country'] == "Ukraine" ){ $currency = '₴'; }
                        else if ( $input['country'] == "United Arab Emirates" ){ $currency = 'د.إ'; }
                        else if ( $input['country'] == "United Kingdom" ){ $currency = '£'; }
                        else if ( $input['country'] == "United States" ){ $currency = '$'; }
                        else if ( $input['country'] == "United States Minor Outlying Islands" ){ $currency = '$'; }
                        else if ( $input['country'] == "Uruguay" ){ $currency = '$'; }
                        else if ( $input['country'] == "Uzbekistan" ){ $currency = 'лв'; }
                        else if ( $input['country'] == "Vanuatu" ){ $currency = 'VT'; }
                        else if ( $input['country'] == "Venezuela" ){ $currency = 'Bs.'; }
                        else if ( $input['country'] == "Vietnam" ){ $currency = '₫'; }
                        else if ( $input['country'] == "British, Virgin Islands" ){ $currency = '$'; }
                        else if ( $input['country'] == "U.S., Virgin Islands" ){ $currency = '$'; }
                        else if ( $input['country'] == "Wallis And Futuna" ){ $currency = 'Fr'; }
                        else if ( $input['country'] == "Western Sahara" ){ $currency = 'د.م.'; }
                        else if ( $input['country'] == "Yemen" ){ $currency = '﷼'; }
                        else if ( $input['country'] == "Zambia" ){ $currency = 'ZK'; }
                        else if ( $input['country'] == "Zimbabwe" ){ $currency = 'Z$'; }
             
                         $accountNumber = rand(1645566556, 5575755768);
                         $validToken = rand(7650, 1234);

        $user = User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'token' => $validToken,
            'address' => $input['address'],
            'phone_number' => $input['phone'],
            'country' => $input['country'],
            'account_pin' => $input['account_pin'],
            'account_type' => $input['account_type'],
            'currency' => $currency,
            'a_number' => $accountNumber,
            'password' => Hash::make($input['password'])
          ]);

       $email = $input['email'];

      
        Mail::to($email)->send(new VerificationEmail($validToken));



        // Mail::to($email)->send(new welcomeEmail($data));

        return $user;
  
    }
}

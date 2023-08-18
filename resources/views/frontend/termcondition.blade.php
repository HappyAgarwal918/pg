@extends('layouts.master')

@section('title', 'Terms and Conditions')
@section('description', 'Shina Real Estate HTML Template')

@section('content')
<div class="container my-5">
	<h1>Terms and Conditions for Renting Home Site on <strong>HappitoHelp.com</strong></h1>
    <p>Last Updated: 18-August-2023</p>
    
    <p>Welcome to <strong>HappitoHelp.com!</strong> By using our platform to rent home sites, you agree to comply with the following terms and conditions:</p>

    <h2>1. Rental Listings and Transactions:</h2>
    <p>When listing a property for rent or engaging in rental transactions through HappitoHelp.com, you agree to provide accurate and complete information about the property, rental terms, and any other relevant details. You acknowledge that the accuracy of the information provided is your responsibility.</p>

    <h2>2. User Conduct:</h2>
    <p>You agree to use the platform responsibly and not to engage in any unlawful, fraudulent, or malicious activities. This includes refraining from misrepresenting property details, attempting unauthorized access to accounts, and interfering with other users' experiences.</p>

    <h2>3. Payments:</h2>
    <p>Payments for rental transactions conducted through HappitoHelp.com are subject to the agreed-upon terms between the parties involved. We do not store complete payment card information on our servers, and payment processing is handled securely.</p>

    <h2>4. Privacy:</h2>
    <p>Your use of HappitoHelp.com is subject to our <a href="{{ route('privacy')}}">Privacy Policy</a>, which outlines how we collect, use, and protect your information. By using the platform, you consent to the practices described in the Privacy Policy.</p>

    <h2>5. Intellectual Property:</h2>
    <p>The content, design, and features of <strong>HappitoHelp.com</strong> are protected by intellectual property laws. You agree not to copy, distribute, modify, or create derivative works based on our platform without explicit permission.</p>

    <h2>6. Termination:</h2>
    <p>We reserve the right to suspend or terminate your access to <strong>HappitoHelp.com</strong> if you violate these terms and conditions or engage in any behavior that may harm the platform or other users.</p>

    <h2>7. Changes to Terms:</h2>
    <p>We may update these terms and conditions from time to time. Any significant changes will be communicated through the platform. Continued use of <strong>HappitoHelp.com</strong> after such changes constitutes your acceptance of the updated terms.</p>

    <h2>8. Contact Us:</h2>
    <p>If you have questions or concerns about these terms and conditions, please contact us at <a href="tel:{{$frontend['footer']->phone}}">{{$frontend['footer']->phone}}</a> / <a href="mailto:{{$frontend['footer']->email}}">{{$frontend['footer']->email}}</a>.</p>

    <p>By using HappitoHelp.com, you acknowledge that you have read, understood, and agreed to these terms and conditions.</p>
</div>
@endsection
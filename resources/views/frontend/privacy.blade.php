@extends('layouts.master')

@section('title', 'Privacy Policy | Happi To Help')
@section('description', 'Shina Real Estate HTML Template')

@section('content')
<div class="container my-5">
	<h1>Privacy Policy for Renting Home Site <b>{{ env('APP_URL')}}</b></h1>
    <p>Last Updated: 18-August-2023</p>
    
    <p>At <strong>{{ env('APP_URL')}}</strong>, we are committed to safeguarding your privacy and protecting your personal information. This Privacy Policy outlines how we collect, use, disclose, and protect your information when you use our platform to rent home sites. By accessing or using our services, you agree to the terms outlined in this policy.</p>

    <h2>1. Information We Collect:</h2>
    <p>We may collect the following types of information:</p>
    <ul>
        <li><strong>Personal Information:</strong> This includes your name, email address, phone number, and any other information you provide when creating an account or using our services.</li>
        <li><strong>Property Information:</strong> Information related to the property you are looking to rent, including its location, size, amenities, and rental preferences.</li>
        <li><strong>Payment Information:</strong> If you choose to make payments through our platform, we may collect payment card details, billing address, and transaction history. However, we do not store full payment card information on our servers.</li>
        <li><strong>Communications:</strong> We may collect and store communications sent through our platform, including messages between users and customer support.</li>
        <li><strong>Usage Data:</strong> We may collect information about how you use our platform, including your browsing history, pages visited, search queries, and interactions with our features.</li>
        <li><strong>Device Information:</strong> Information about the device you use to access our services, including IP address, browser type, operating system, and unique device identifiers.</li>
    </ul>

    <h2>2. How We Use Your Information:</h2>
    <p>We use your information for various purposes, including:</p>
    <ul>
        <li><strong>Providing Services:</strong> To facilitate the process of renting home sites, including property listings, inquiries, and communication between users.</li>
        <li><strong>Payment Processing:</strong> To process payments for rental transactions and manage billing.</li>
        <li><strong>Communication:</strong> To respond to your inquiries, send notifications, updates, and promotional materials.</li>
        <li><strong>Improving Services:</strong> To analyze user behavior, preferences, and feedback to enhance our platform's functionality and user experience.</li>
        <li><strong>Legal Compliance:</strong> To comply with legal obligations and respond to law enforcement requests or court orders.</li>
    </ul>

    <h2>3. Sharing Your Information:</h2>
    <p>We may share your information in the following circumstances:</p>
    <ul>
        <li><strong>With Other Users:</strong> Information necessary to facilitate rental transactions and communication between users.</li>
        <li><strong>Service Providers:</strong> We may share your information with third-party service providers who assist us in operating our platform and providing services.</li>
        <li><strong>Legal Requirements:</strong> We may disclose your information to comply with legal obligations, protect our rights, and respond to legal requests.</li>
        <li><strong>Business Transfers:</strong> In the event of a merger, acquisition, or sale of assets, your information may be transferred to the acquiring entity.</li>
    </ul>

    <h2>4. Service Providers</h2>
	<p>We may employ third-party companies and individuals due to the following reasons:</p>
	<ul>
	<li>To facilitate our Service;</li>
	<li>To provide the Service on our behalf;</li>
	<li>To perform Service-related services; or</li>
	<li>To assist us in analyzing how our Service is used.</li>
	</ul>
	<p>We want to inform our Service users that these third parties have access to your Personal Information. The reason is to perform the tasks assigned to them on our behalf. However, they are obligated not to disclose or use the information for any other purpose.</p>

    <h2>5. Links to Other Sites</h2>
	<p>Our Service may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that these external sites are not operated by us. Therefore, we strongly advise you to review the Privacy Policy of these websites. We have no control over, and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>

    <h2>6. Data Security:</h2>
    <p>We implement security measures to protect your information from unauthorized access, loss, misuse, and alteration. However, no data transmission over the internet is completely secure, and we cannot guarantee the security of your information.</p>

    <h2>7. Your Choices:</h2>
    <p>You have the right to:</p>
    <ul>
        <li>Access, correct, or update your personal information.</li>
        <li>Delete your account and associated data.</li>
        <li>Opt-out of promotional communications.</li>
    </ul>

    <h2>8. Children's Privacy:</h2>
    <p>Our platform is not intended for children under the age of 18. We do not knowingly collect personal information from individuals under 18 years of age.</p>

    <h2>9. Updates to this Policy:</h2>
    <p>We may update this Privacy Policy from time to time to reflect changes in our practices or legal requirements. We will notify you of significant changes through our platform or by other means.</p>

    <h2>10. Contact Us:</h2>
    <p>If you have any questions, concerns, or requests regarding this Privacy Policy or your personal information, please contact us at <a href="tel:{{$frontend['footer']->phone}}">{{$frontend['footer']->phone}}</a> / <a href="mailto:{{$frontend['footer']->email}}">{{$frontend['footer']->email}}</a>.</p>

    <p>By using {{ env('APP_URL')}}, you acknowledge that you have read and understood this Privacy Policy and agree to its terms.</p>

</div>

@endsection
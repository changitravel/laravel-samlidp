<md:EntityDescriptor xmlns:md="urn:oasis:names:tc:SAML:2.0:metadata" validUntil="2027-01-20T19:04:25Z" cacheDuration="PT1485371065S" entityID="{{ url(config('samlidp.issuer_uri')) }}">
  <md:IDPSSODescriptor WantAuthnRequestsSigned="false" protocolSupportEnumeration="urn:oasis:names:tc:SAML:2.0:protocol">
    <md:KeyDescriptor use="signing">
      <KeyInfo xmlns="http://www.w3.org/2000/09/xmldsig#">
          <X509Data>
              <X509Certificate>
                {{ $cert }}
              </X509Certificate>
        </X509Data>
      </KeyInfo>
    </md:KeyDescriptor>
    <md:KeyDescriptor use="encryption">
      <ds:KeyInfo xmlns:ds="http://www.w3.org/2000/09/xmldsig#">
        <ds:X509Data>
          <ds:X509Certificate>{{ $cert }}</ds:X509Certificate>
        </ds:X509Data>
      </ds:KeyInfo>
    </md:KeyDescriptor>
    <md:NameIDFormat>urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress</md:NameIDFormat>
		<md:SingleSignOnService Binding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect" Location="https://reporting-login.changirecommends.com/login"/>
		<md:SingleSignOnService Binding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST" Location="https://reporting-login.changirecommends.com/login"/>
		<md:SingleLogoutService Binding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect" Location="https://reporting-login.changirecommends.com/logout"/>
		<md:SingleLogoutService Binding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST" Location="https://reporting-login.changirecommends.com/logout"/>
  </md:IDPSSODescriptor>
	<md:Organization>
		<md:OrganizationName xml:lang="en">Phoenix</md:OrganizationName>
		<md:OrganizationDisplayName xml:lang="en">Phoenix</md:OrganizationDisplayName>
		<md:OrganizationURL xml:lang="en">www.changirecommends.com</md:OrganizationURL>
	</md:Organization>
	<md:ContactPerson contactType="technical">
		<md:GivenName>Phoenix</md:GivenName>
		<md:SurName>Support</md:SurName>
		<md:EmailAddress>noreply@changirecommends.com</md:EmailAddress>
	</md:ContactPerson>
</md:EntityDescriptor>

# Dev Pilates 

Project: urlShortener

Rules:

Please do not use any existing third-party code or frameworks, unless
you are instructed otherwise.

Please note: the specifications may be incomplete or even contain
deliberate errors. In this case, make suitable assumptions and document
it, including the justification for your decision.

- code must be written in PHP 5.6, and adhere to your team's Coding Guidelines
- code must be self-contained and not contain any third-party code
- code must have 100% unit test coverage, with PHPUnit configured as strict as possible
- code must provide an executable specification (PHPUnit's testdox feature)
- code must not contain any todo comments
- code must not contain unnecessary generalizations or speculative features
- keep things as simple as possible


 First Iteration
 ===============
 
 Any HTTP or HTTPS URL can be shortened to a hash of eight alphanumeric
 characters.
  - Revealed requirement for ONLY http(s) urls (no mail:, ftp://, etc).  Any otherwise valid URLs (rfc2396) will be rejected
  
 Second Iteration
 ================

 Hashes can be mapped back to the original URL.

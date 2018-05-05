#include <phpcpp.h>
#include <iostream>
#include <string>
#include <regex>

void ds_hello()
{
    Php::out << "hello from Dominik Extension 1.0" << std::endl;
}

/**
 * Replaces regular links with hyperlinks in a string, as follows:
 * input:
 * http://bla.ok/link.html
 * 
 * result:
 *  <a href="http://bla.ok/link.html">http://bla.ok/link.html</a>
 * 
 * @param string input
 * @return string
 */
Php::Value replaceUrlsWithAnchors(Php::Parameters &params){
	const char* input = params[0];
    const static std::regex reg ("http(s?)://[^\\s]+");
    return regex_replace(input, reg, "<a href=\"$&\">$&</a>");
}

extern "C" {
    PHPCPP_EXPORT void *get_module() {
        static Php::Extension extension("DominikExtension", "1.1");
        extension.add<ds_hello>("ds_hello");
		extension.add<replaceUrlsWithAnchors>("ds_replace_urls_with_anchors",
			{
				Php::ByVal("input", Php::Type::String, true) // (name, type, required)
		    }
		);
        return extension;
    }
}
#include <phpcpp.h>
#include <iostream>

void ds_hello()
{
    Php::out << "hello from Dominik Extension 1.0" << std::endl;
}

extern "C" {
    PHPCPP_EXPORT void *get_module() {
        static Php::Extension extension("DominikExtension", "1.0");
        extension.add<ds_hello>("ds_hello");
        return extension;
    }
}
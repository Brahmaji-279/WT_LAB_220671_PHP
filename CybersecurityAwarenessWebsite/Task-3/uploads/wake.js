function hook(lib, name) {
    try {
        const addr = Module.getExportByName(lib, name);
        Interceptor.attach(addr, {
            onEnter(args) {
                console.log("[+] " + name + " called");
            },
            onLeave(retval) {
                console.log("[+] forcing return for " + name);
                retval.replace(0);
            }
        });
        console.log("[+] hooked " + lib + "!" + name);
    } catch (e) {
        console.log("[-] not found:", lib + "!" + name);
    }
}

// High-level waits
hook("Kernel32.dll", "SleepConditionVariableSRW");
hook("Kernel32.dll", "WaitForSingleObject");
hook("Kernel32.dll", "WaitForSingleObjectEx");

// Low-level NT waits (VERY IMPORTANT)
hook("ntdll.dll", "NtWaitForSingleObject");
hook("ntdll.dll", "ZwWaitForSingleObject");


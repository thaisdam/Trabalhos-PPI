package com.example.demo;

import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.List;

@RestController
public class AddressController {

    private List<Address> addresses = new ArrayList<>();

    // GET /hello
    @GetMapping("/hello")
    public String helloWorld() {
        return "Hello World!";
    }

    // GET /address
    @GetMapping("/address")
    public List<Address> getAddresses() {
        return addresses;
    }

    // GET /address/{cep}
    @GetMapping("/address/{cep}")
    public ResponseEntity<Address> getAddress(@PathVariable String cep) {
        return addresses.stream()
                .filter(a -> a.getCep().equals(cep))
                .findFirst()
                .map(ResponseEntity::ok)
                .orElse(ResponseEntity.notFound().build());
    }

    // POST /address
    @PostMapping("/address")
    public void addAddress(@RequestBody Address address) {
        addresses.add(address);
    }

    // DELETE /address/{cep}
    @DeleteMapping("/address/{cep}")
    public void deleteAddress(@PathVariable String cep) {
        addresses.removeIf(a -> a.getCep().equals(cep));
    }
}

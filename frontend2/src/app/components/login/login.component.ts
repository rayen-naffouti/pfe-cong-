import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { LocalStorageService } from "src/app/service/local-storage.service";

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  form!: FormGroup;

  constructor(
    private formBuilder: FormBuilder,
    private http: HttpClient,
    private router: Router,
    private localStorageService: LocalStorageService
  ) {
  }

  ngOnInit(): void {
    this.form = this.formBuilder.group({
      email: '',
      password: ''
    });
    
    
  }

  submit(): void {
    this.http.post('http://localhost:8000/api/login', this.form.getRawValue(), {
      withCredentials: true
    }).subscribe((res: any) => {
    this.router.navigate(['/dashboard']).then(() => {window.location.reload();})
    this.localStorageService.set('access_token', 'token');
  });
    
  }
  
}

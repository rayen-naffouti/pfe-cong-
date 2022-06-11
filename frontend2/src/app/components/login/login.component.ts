import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { LocalStorageService } from "src/app/service/local-storage.service";
import { AuthService } from 'src/app/service/auth.service';
import { FormControl,  Validator } from '@angular/forms';
import { ToastrService } from 'ngx-toastr';




@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  form!: FormGroup;
  test:any;

  constructor(
    private formBuilder: FormBuilder,
    private http: HttpClient,
    private router: Router,
    private localStorageService: LocalStorageService,
    private authService: AuthService,
    private toastr: ToastrService
  ) {
  }

  ngOnInit(): void {
    if (this.authService.loggedIn()){
      this.router.navigate(['/dashboard'])
    }
    //  console.log(this.test)

    // this.form = this.formBuilder.group({
    //   email: '',
    //   password: ''  
    // });
    this.form = new FormGroup({
      email: new FormControl('',[Validators.required,Validators.email]),
      password: new FormControl('',Validators.required)
    })

    
    
    
  }
  get email(){return this.form.get('email')}
  get password(){return this.form.get('password')}


  submit(): void {
    this.http.post('http://localhost:8000/api/login', this.form.getRawValue(), {
      withCredentials: true
    }).subscribe((res: any) => {  
    this.router.navigate(['/dashboard']).then(() => {window.location.reload();})
    this.localStorageService.set('access_token', 'token');
  },
  (error) => {                              //Error callback
    // console.log('invalid credentilas')
    this.toastr.error('incorrect credentials!');
  }
  );
    
  }
  
}

import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { Observable } from 'rxjs/internal/Observable';
import { AuthService } from 'src/app/service/auth.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {
  form!: FormGroup;
  user:any;
  userimagepath:any = 'http://127.0.0.1:8000/image/';
  test:any;
  constructor(
    private http: HttpClient,
    private router: Router,
    private authService: AuthService
  ) {
  }

  ngOnInit(): void {
    this.getUser();
    if (this.authService.loggedIn()){
      this.test = true;
    }else{
      this.test = false
    }
    // console.log(this.test)
  }
  
  getUser(){
    this.authService.getuser().subscribe(res => {
      this.user = res;
        // console.log(this.user)
    })
  }

  logout(): void {
    this.authService.logout();
  }

  
}

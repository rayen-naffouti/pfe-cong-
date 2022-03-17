import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { RouterModule, Routes } from '@angular/router';

import { AppComponent } from './app.component';
import { HttpClientModule } from '@angular/common/http';
import { NavbarComponent } from './navbar/navbar.component';
import { CongeComponent } from './components/conge/conge.component';
import { LoginComponent } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

const appRoutes: Routes = [

  { path: '', redirectTo: '/dashboard', pathMatch: 'full' },

  { path: 'login', component: LoginComponent},

  { path: 'register', component: RegisterComponent },
  
  { path: 'dashboard', loadChildren: () => import('./components/dashboard/dashboard.module').then(m => m.DashboardModule) },
  
  { path: 'personnels', loadChildren: () => import('./components/personnels/personnels.module').then(m => m.PersonnelsModule) },
  
  { path : 'conge', component: CongeComponent} 

]



@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    CongeComponent,
    LoginComponent,
    RegisterComponent
    
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    RouterModule.forRoot(appRoutes)
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

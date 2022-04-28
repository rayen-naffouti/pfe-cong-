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
import { AuthService } from './service/auth.service';
import { AuthGuard } from './auth.guard';
import { DemandesComponent } from './components/demandes/demandes.component';
import { ListedemandeComponent } from './components/listedemande/listedemande.component';
import { AlldemandesComponent } from './components/alldemandes/alldemandes.component';
import { NoopAnimationsModule } from '@angular/platform-browser/animations';
import { pdfDefaultOptions } from 'ngx-extended-pdf-viewer';
import { NgxExtendedPdfViewerModule } from 'ngx-extended-pdf-viewer';
import { PdfViewerModule } from 'ng2-pdf-viewer'

const appRoutes: Routes = [

  { path: '', redirectTo: '/dashboard', pathMatch: 'full' ,
  
},

  { path: 'login', component: LoginComponent},

  { path: 'register', component: RegisterComponent 
  },
  
  { path: 'dashboard', loadChildren: () => import('./components/dashboard/dashboard.module').then(m => m.DashboardModule) ,
    canActivate: [AuthGuard]
  },
  
  { path: 'personnels', loadChildren: () => import('./components/personnels/personnels.module').then(m => m.PersonnelsModule) ,
    canActivate: [AuthGuard]
  },
  
  { path : 'conge', component: CongeComponent,
    canActivate: [AuthGuard]
  },

  { path : 'add_leave', component: DemandesComponent,
    canActivate: [AuthGuard]
  },

  // Admin
  { path : 'my_leaves', component: AlldemandesComponent,
    canActivate: [AuthGuard]
  },

  // User
  { path : 'all_leaves', component: ListedemandeComponent,
    canActivate: [AuthGuard]
  } 

]



@NgModule({
  declarations: [
    AppComponent,
    NavbarComponent,
    CongeComponent,
    LoginComponent,
    RegisterComponent,
    DemandesComponent,
    ListedemandeComponent,
    AlldemandesComponent
    
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    RouterModule.forRoot(appRoutes),
    NoopAnimationsModule,
    NgxExtendedPdfViewerModule,
    PdfViewerModule
  ],
  providers: [AuthService, AuthGuard],
  bootstrap: [AppComponent]
})
export class AppModule { }

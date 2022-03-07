import { HttpClient, HttpClientModule } from '@angular/common/http';
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NoopAnimationsModule } from '@angular/platform-browser/animations';
import { MainHeaderComponent } from './header/main-header/main-header.component';
import { SFAMHeaderComponent } from './header/sfam-header/sfam-header.component';
import { SfamContenuComponent } from './sfam-contenu/sfam-contenu.component';
import { GoogleChartsModule } from 'angular-google-charts';
import { Routes } from '@angular/router';

const appRoute: Routes = [
  { path:'', component: }
]

@NgModule({
  declarations: [
    AppComponent,
    MainHeaderComponent,
    SFAMHeaderComponent,
    SfamContenuComponent,
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    AppRoutingModule,
    NoopAnimationsModule,
    GoogleChartsModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
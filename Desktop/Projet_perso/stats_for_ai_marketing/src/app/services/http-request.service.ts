import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class HttpRequestService {
  urlPath: string;
  urlLocalPath: string;
  sfam: string;

  constructor(private http:HttpClient) {
    this.urlPath = "./API/";
    this.urlLocalPath = "http://leoterras.com/API/";

    this.sfam = this.urlPath + "stats.php";
  }
}

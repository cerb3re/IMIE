package com.moventes.com.imdb;

import android.os.AsyncTask;

import java.io.IOException;

import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

public class NetworkRequestLauncher extends AsyncTask<String, Void, Response> {

    private OkHttpClient client;

    /**
     * Constructeur
     */
    public NetworkRequestLauncher() {
        // on initialise le client okhttp en charge de faire les appels REST
        this.client = new OkHttpClient();
    }

    /**
     * Exécute le code en arrière plan
     * on récupère un tableau d'élément
     */
    @Override
    protected Response doInBackground(String[] urls) {
        // on initialise l'objet response renvoyé par la méthode
        Response response = null;

        // on prépare l'objet request à partir de l'url
        // cet objet est utilisé par le client okhttp
        Request request = new Request.Builder()
                .url(urls[0])
                .build();

        // on place l'appel dans un try...catch pour gérer les exceptions
        try {
            // on fait l'appel REST proprement dit
            response = this.client.newCall(request).execute();
        } catch (IOException e) {
            // en cas d'erreur, on la log
            e.printStackTrace();
        }

        // on renvoie la réponse
        return response;
    }
}

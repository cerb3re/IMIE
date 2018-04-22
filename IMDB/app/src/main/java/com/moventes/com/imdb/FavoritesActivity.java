package com.moventes.com.imdb;

import android.arch.persistence.room.Room;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;

import java.util.ArrayList;
import java.util.List;
import java.util.concurrent.ExecutionException;

public class FavoritesActivity extends AppCompatActivity {

    AppDatabase db;

    ArrayList<Movie> movies = null;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.favorites_activity);

        db = Room.databaseBuilder(getApplicationContext(),
                AppDatabase.class, "database-name").build();

        ListView list = findViewById(R.id.list);


        try {
            movies = (ArrayList<Movie>) new GetFilmsTask().execute().get();
        } catch (InterruptedException | ExecutionException e) {
            e.printStackTrace();
        }

        MoviesAdapter adapter = new MoviesAdapter(this,
                R.layout.item_layout, movies);

        list.setAdapter(adapter);

        // on branche un onItemClickListener
        list.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view,
                                    int position, long id) {
                Intent intent = new Intent(FavoritesActivity.this,
                        DetailsActivity.class);
                intent.putExtra("MOVIE_ID", movies.get(position).getId());
                FavoritesActivity.this.startActivity(intent);
            }
        });
    }

    class GetFilmsTask extends AsyncTask<Void, Void, List<Movie>> {

        @Override
        protected List<Movie> doInBackground(Void... voids) {
            return db.movieDao().getMovies();
        }
    }
}
